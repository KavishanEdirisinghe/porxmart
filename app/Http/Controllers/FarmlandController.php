<?php

namespace App\Http\Controllers;

use App\Models\Farm_land;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FarmlandController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('farmer');

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }
        $land = Farm_land::select(
            'farm_land.id',
            'farm_land.registraion_no',
            'farm_land.size',
            'province.province',
            'district.district',
            'divisional_secretariat.divisional_secretariat',
            'grama_niladhari_division.grama_niladhari_division'
        )
            ->join('grama_niladhari_division', 'farm_land.grama_niladhari_division_id', '=', 'grama_niladhari_division.id')
            ->join('divisional_secretariat', 'grama_niladhari_division.divisional_secretariat_id', '=', 'divisional_secretariat.id')
            ->join('district', 'divisional_secretariat.district_id', '=', 'district.id')
            ->join('province', 'district.province_id', '=', 'province.id')
            ->where('farm_land.users_id', $user->id)
            ->where('farm_land.status', 1)
            ->get();


        $province = Province::where('status', 1)->get();
        return view('Farmer.FarmLand.index', [
            'user' => $user,
            'land' => $land,
            'province' => $province,
        ]);
    }

    public function create(Request $request, $id)
    {
        try {
            // Validate that we have at least one land entry
            $request->validate([
                'lands' => 'required|array|min:1',
                'lands.*.landRegistration' => 'required',
                'lands.*.province' => 'required',
                'lands.*.districts' => 'required',
                'lands.*.divisionalSecretary' => 'required',
                'lands.*.gramaNiladari' => 'required',
                'lands.*.landSize' => 'required',
            ], [
                'lands.*.landRegistration.required' => 'The land registration number is required for all entries.',
                'lands.*.province.required' => 'The province is required for all entries.',
                'lands.*.districts.required' => 'The district is required for all entries.',
                'lands.*.divisionalSecretary.required' => 'The divisional secretary is required for all entries.',
                'lands.*.gramaNiladari.required' => 'The grama niladari is required for all entries.',
                'lands.*.landSize.required' => 'The land size is required for all entries.',
            ]);

            $user = User::find($id);

            if (!$user) {
                return redirect()->route('login')->with('error', 'User not found');
            }

            // Process each land entry
            foreach ($request->lands as $landData) {
                Farm_land::create([
                    'registraion_no' => $landData['landRegistration'],
                    'size' => $landData['landSize'],
                    'grama_niladhari_division_id' => $landData['gramaNiladari'],
                    'users_id' => $id
                ]);
            }


            return redirect()->back()->with('success', 'Land registration completed successfully');
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
        $land = Farm_land::select(
            'farm_land.id',
            'farm_land.registraion_no',
            'farm_land.size',
            'province.province',
            'district.id as district_id',
            'district.district',
            'divisional_secretariat.id as divisional_secretariat_id',
            'divisional_secretariat.divisional_secretariat',
            'grama_niladhari_division.id as grama_niladhari_division_id',
            'grama_niladhari_division.grama_niladhari_division',
        )
            ->join('grama_niladhari_division', 'farm_land.grama_niladhari_division_id', '=', 'grama_niladhari_division.id')
            ->join('divisional_secretariat', 'grama_niladhari_division.divisional_secretariat_id', '=', 'divisional_secretariat.id')
            ->join('district', 'divisional_secretariat.district_id', '=', 'district.id')
            ->join('province', 'district.province_id', '=', 'province.id')
            ->where('farm_land.id', $id)
            ->first();
        $province = Province::where('status', 1)->get();

        if (!$land) {
            return redirect()->back()->with('error', 'Land not found');
        }


        return view('Farmer.FarmLand.edit', [
            'land' => $land,
            'province' => $province,
        ]);
    }

    public function edit(Request $request, $id)
    {
        try {
            // Validate that we have at least one land entry
            $request->validate([
                'landRegistration' => 'required',
                'province' => 'required',
                'districts' => 'required',
                'divisionalSecretary' => 'required',
                'gramaNiladari' => 'required',
                'landSize' => 'required',
            ], [
                'landRegistration.required' => 'The land registration number is required for all entries.',
                'province.required' => 'The province is required for all entries.',
                'districts.required' => 'The district is required for all entries.',
                'divisionalSecretary.required' => 'The divisional secretary is required for all entries.',
                'gramaNiladari.required' => 'The grama niladari is required for all entries.',
                'landSize.required' => 'The land size is required for all entries.',
            ]);

            $land = Farm_land::find($id);
            if ($land) {
                $land->update([
                    'registraion_no' => $request->landRegistration,
                    'size' => $request->landSize,
                    'grama_niladhari_division_id' => $request->gramaNiladari,
                ]);
            } else {
                return redirect()->back()->with('error', 'Land not found');
            }

            return redirect()->route('farm_land')->with('success', 'Land Edit completed successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors->first());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function delete( $id)
    {
        try {
            $land = Farm_land::find($id);
            if ($land) {
                $land->update(['status' => 0]);
                return redirect()->back()->with('success', 'Land deleted successfully');
            } else {
                return redirect()->back()->with('error', 'Land not found');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
