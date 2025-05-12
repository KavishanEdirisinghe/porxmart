<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Paddy_demand;
use App\Models\Paddy_varieties;
use App\Models\Timing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaddyDemandController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('vendor');

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $business = Business::select('business.id', 'business.name', 'business.registration_no')
            ->where('business.user_id', $user->id)
            ->get();

        $paddy_variety = Paddy_varieties::where('status', 1)
            ->get();

        $timing = Timing::where('status', 1)
            ->get();

        $paddy_demand = Paddy_demand::select('paddy_demand.id', 'paddy_demand.quantity', 'business.name as business_name', 'timing.timing as timing_name', 'paddy_varieties.name as paddy_variety_name')
            ->join('business', 'paddy_demand.business_id', '=', 'business.id')
            ->join('timing', 'paddy_demand.timing_id', '=', 'timing.id')
            ->join('paddy_varieties', 'paddy_demand.paddy_varieties_id', '=', 'paddy_varieties.id')
            ->where('paddy_demand.user_id', $user->id)
            ->where('paddy_demand.status', 1)
            ->get();

        return view('Vendor.PaddyDemand.index', [
            'user' => $user,
            'business' => $business,
            'paddy_variety' => $paddy_variety,
            'timing' => $timing,
            'paddy_demand' => $paddy_demand,
        ]);
    }

    public function create(Request $request, $id)
    {
        // dd($request->all());
        try {
            // Validate the request data
            $validated =  $request->validate([
                'business' => 'required',
                'timing' => 'required',
                'quntity' => 'required',
                'paddy_varieties' => 'required|array',
                'paddy_varieties.*' => 'exists:paddy_varieties,id',
            ]);

            foreach ($validated['paddy_varieties'] as $varietyId) {
                Paddy_demand::create([
                    'quantity' => $validated['quntity'],
                    'business_id' => $validated['business'],
                    'user_id' => $id,
                    'paddy_varieties_id' => $varietyId,
                    'timing_id' => $validated['timing']
                ]);
            }

            return redirect()->route('paddy_demand_index')->with('success', 'Paddy Demand create successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors->first());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function edit_index($id)
    {
        $user = session()->get('vendor');
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $paddy_demand = Paddy_demand::find($id);
        if (!$paddy_demand) {
            return redirect()->route('paddy_demand_index')->with('error', 'Paddy Demand not found');
        }
        $business = Business::select('business.id', 'business.name', 'business.registration_no')
            ->where('business.user_id', $paddy_demand->user_id)
            ->get();
        $paddy_variety = Paddy_varieties::where('status', 1)
            ->get();
        $timing = Timing::where('status', 1)
            ->get();
        return view('vendor.PaddyDemand.edit', [
            'user' => $user,
            'paddy_demand' => $paddy_demand,
            'business' => $business,
            'paddy_variety' => $paddy_variety,
            'timing' => $timing,
        ]);
    }

    public function edit(Request $request, $id)
    {
        try {
            // Validate the request data
            $validated =  $request->validate([
                'business' => 'required',
                'timing' => 'required',
                'quntity' => 'required',
                'paddy_varieties' => 'required|array',
                'paddy_varieties.*' => 'exists:paddy_varieties,id',
            ]);

            foreach ($validated['paddy_varieties'] as $varietyId) {
                Paddy_demand::where('id', $id)->update([
                    'quantity' => $validated['quntity'],
                    'business_id' => $validated['business'],
                    'user_id' => $request->session()->get('vendor')->id,
                    'paddy_varieties_id' => $varietyId,
                    'timing_id' => $validated['timing']
                ]);
            }

            return redirect()->route('paddy_demand_index')->with('success', 'Paddy Demand updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors->first());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $paddy_demand = Paddy_demand::find($id);
            if (!$paddy_demand) {
                return redirect()->route('paddy_demand_index')->with('error', 'Paddy Demand not found');
            }
            $paddy_demand->update(['status' => 0]);
            return redirect()->route('paddy_demand_index')->with('success', 'Paddy Demand deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
