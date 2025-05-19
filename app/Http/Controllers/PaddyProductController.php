<?php

namespace App\Http\Controllers;

use App\Models\Farm_land;
use App\Models\Paddy_product;
use App\Models\Paddy_varieties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaddyProductController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('farmer');
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $lands = Farm_land::where('status', 1)->where('users_id', $user->id)->get();
        $paddyVarieties = Paddy_varieties::where('status', 1)->get();

        $products = Paddy_product::select(
            'paddy_production.id',
            'paddy_production.sawn_date',
            'paddy_production.expected_yeild',
            'farm_land.registraion_no',
            'paddy_varieties.name'
        )
            ->join('farm_land', 'paddy_production.fam_land_id', '=', 'farm_land.id')
            ->join('paddy_varieties', 'paddy_production.paddy_varieties_id', '=', 'paddy_varieties.id')
            ->where('paddy_production.user_id', $user->id)
            ->where('paddy_production.status', 1)
            ->get();

        return view('Farmer.PaddyProduct.index', [
            'user' => $user,
            'lands' => $lands,
            'paddyVarieties' => $paddyVarieties,
            'products' => $products,
        ]);
    }

    public function create(Request $request, $id)
    {
        try {
            // Validate that we have at least one land entry
            $request->validate([
                'land_id' => 'required',
                'variety_id' => 'required',
                'sown_date' => 'required',
                'expected_yield' => 'required',
            ], [
                'land_id.required' => 'The land ID is required for all entries.',
                'variety_id.required' => 'The variety ID is required for all entries.',
                'sown_date.required' => 'The sown date is required for all entries.',
                'expected_yield.required' => 'The expected yield is required for all entries.',
            ]);

            $user = User::find($id);

            if (!$user) {
                return redirect()->route('login')->with('error', 'User not found');
            }

            Paddy_product::create([
                'sawn_date' => $request->sown_date,
                'expected_yeild' => $request->expected_yield,
                'user_id' => $user->id,
                'fam_land_id' => $request->land_id,
                'paddy_varieties_id' => $request->variety_id,
            ]);


            return redirect()->back()->with('success', 'New product create completed successfully');
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
        $user = $request->session()->get('farmer');
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $lands = Farm_land::where('status', 1)->where('users_id', $user->id)->get();
        $paddyVarieties = Paddy_varieties::where('status', 1)->get();


        $products = Paddy_product::where('id', $id)->first();

        $expectedYieldInMt = $products->expected_yeild;
        $expectedYieldDisplay = $expectedYieldInMt >= 1 ? $expectedYieldInMt : $expectedYieldInMt * 1000;
        $expectedYieldUnit = $expectedYieldInMt >= 1 ? 'mt' : 'kg';

        if (!$products) {
            return redirect()->back()->with('error', 'Product not found');
        }



        return view('Farmer.PaddyProduct.edit', [
            'products' => $products,
            'user' => $user,
            'lands' => $lands,
            'paddyVarieties' => $paddyVarieties,
            'expectedYieldDisplay' => $expectedYieldDisplay,
            'expectedYieldUnit' => $expectedYieldUnit,
        ]);
    }

    public function edit(Request $request, $id)
    {
        try {
            // Validate that we have at least one land entry
            $request->validate([
                'land_id' => 'required',
                'variety_id' => 'required',
                'sown_date' => 'required',
                'expected_yield' => 'required',
            ], [
                'land_id.required' => 'The land ID is required for all entries.',
                'variety_id.required' => 'The variety ID is required for all entries.',
                'sown_date.required' => 'The sown date is required for all entries.',
                'expected_yield.required' => 'The expected yield is required for all entries.',
            ]);

            $product = Paddy_product::find($id);
            if ($product) {
                $product->update([
                    'sawn_date' => $request->sown_date,
                    'expected_yeild' => $request->expected_yield,
                    'fam_land_id' => $request->land_id,
                    'paddy_varieties_id' => $request->variety_id,
                ]);
            } else {
                return redirect()->back()->with('error', 'Product not found');
            }

            return redirect()->route('paddy_product_index')->with('success', 'Product Edit completed successfully');
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
            $product = Paddy_product::find($id);
            if ($product) {
                $product->update(['status' => 0]);
            } else {
                return redirect()->back()->with('error', 'Product not found');
            }

            return redirect()->route('paddy_product_index')->with('success', 'Product delete completed successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
