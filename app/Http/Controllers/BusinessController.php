<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Business_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('vendor');

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $business_types = Business_types::where('status', 1)->get();

        $business = Business::select('business.id','business_types.type', 'business.name', 'business.registration_no')
            ->join('business_types', 'business.business_types_id', '=', 'business_types.id')
            ->where('business.user_id', $user->id)
            ->where('business.status', 1)
            ->get();    

        return view('Vendor.Business.index', [
            'user' => $user,
            'business_types' => $business_types,
            'business' => $business,
        ]);
    }

    public function create(Request $request, $id)
    {
        try {
            // Validate that we have at least one business entry
            $request->validate([
                'businesses' => 'required|array|min:1',
                'businesses.*.business_name' => 'required|string|max:255',
                'businesses.*.business_registration_number' => 'required|string|max:50',
                'businesses.*.business_type' => 'required|exists:business_types,id',
            ], [
                'businesses.*.business_name.required' => 'The business name is required for all entries.',
                'businesses.*.business_registration_number.required' => 'The business registration number is required for all entries.',
                'businesses.*.business_type.required' => 'The business type is required for all entries.',
                'businesses.*.business_type.exists' => 'The selected business type is invalid.',
            ]);




            // Process each business entry
            foreach ($request->businesses as $businessData) {
                Business::create([
                    'name' => $businessData['business_name'],
                    'registration_no' => $businessData['business_registration_number'],
                    'business_types_id' => $businessData['business_type'],
                    'user_id' => $id
                ]);
            }


            return redirect()->route('business')->with('success', 'Business registration completed successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors->first());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function edit_index(Request $request, $id)
    {
        $user = $request->session()->get('vendor');

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $business_types = Business_types::where('status', 1)->get();

        $business = Business::where('id', $id)->first();

        return view('Vendor.Business.edit', [
            'user' => $user,
            'business_types' => $business_types,
            'business' => $business,
        ]);
    }

    public function edit(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'business_name' => 'required|string|max:255',
                'business_registration_number' => 'required|string|max:50',
                'business_type' => 'required|exists:business_types,id',
            ]);

            // Find the business by ID
            $business = Business::findOrFail($id);

            // Update the business details
            $business->name = $request->input('business_name');
            $business->registration_no = $request->input('business_registration_number');
            $business->business_types_id = $request->input('business_type');
            $business->save();

            return redirect()->route('business')->with('success', 'Business updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors->first());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function delete(Request $request, $id)
    {
        try {

            $business = Business::findOrFail($id);
            $business->status = 0;
            $business->save();

            return redirect()->route('business')->with('success', 'Business deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
