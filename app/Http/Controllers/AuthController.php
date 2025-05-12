<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Business_types;
use App\Models\Farm_land;
use App\Models\Province;
use App\Models\User;
use App\Models\User_type;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', ['isLogin' => true]);
    }

    public function register()
    {
        return view('auth.register', ['isLogin' => false]);
    }

    public function role_selection($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        return view('auth.role-selection', ['isLogin' => false, 'user' => $user]);
    }

    public function farmer_registation($id)
    {
        $user = User::find($id);
        $province = Province::where('status', 1)->get();
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        return view('auth.farmer-registration', ['isLogin' => false, 'user' => $user, 'province' => $province]);
    }

    public function vendor_registation($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $business_types = Business_types::where('status', 1)->get();

        return view('auth.vendor-registration', ['isLogin' => false, 'user' => $user, 'business_types' => $business_types]);
    }

    public function basic_registration(Request $request)
    {
        try {
            $data = $request->validate([
                'nic' => 'required|unique:user,nic',
                'name' => 'required',
                'mobile' => 'required',
                'email' => 'required|unique:user,email',
                'password' => 'required',
            ]);

            $hash_password = Hash::make($request->password);

            $user = User::create([
                'nic' => $data['nic'],
                'name' => $data['name'],
                'contact_no' => $data['mobile'],
                'email' => $data['email'],
                'user_type_id' => null,
                'password' => $hash_password
            ]);

            return redirect()->route('role_selection', $user->id)->with('success', 'Basic Registration successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function farm_land_registration(Request $request, $id)
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
            $user_type = User_type::where('id', 1)->first();

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

            // Update user type only once regardless of number of lands
            $user->update([
                'user_type_id' => 1,
            ]);

            $user_type->update([
                'count' => $user_type->count + 1,
            ]);

            return redirect()->route('login')->with('success', 'Land registration completed successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors->first());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function business_registration(Request $request, $id)
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

            $user = User::find($id);
            $user_type = User_type::where('id', 2)->first(); // Assuming 2 is for business owners

            if (!$user) {
                return redirect()->route('login')->with('error', 'User not found');
            }

            // Process each business entry
            foreach ($request->businesses as $businessData) {
                Business::create([
                    'name' => $businessData['business_name'],
                    'registration_no' => $businessData['business_registration_number'],
                    'business_types_id' => $businessData['business_type'],
                    'user_id' => $id
                ]);
            }

            // Update user type only once regardless of number of businesses
            $user->update([
                'user_type_id' => 2, // Assuming 2 is for business owners
            ]);

            $user_type->update([
                'count' => $user_type->count + 1,
            ]);

            return redirect()->route('login')->with('success', 'Business registration completed successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error', $errors->first());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function login_process(Request $request)
    {
        try {
            $request->validate(
                [
                    'email' => 'required',
                    'password' => 'required',
                ]
            );
            $user = User::where(['email' => $request->email, 'status' => 1])->first();

            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->user_type_id == null) {
                    return redirect()->route('role_selection', $user->id)->with('success', 'Please select your role');
                } elseif ($user->user_type_id == 1) {
                    $request->session()->put('farmer', $user);
                } elseif ($user->user_type_id == 2) {
                    $request->session()->put('vendor', $user);
                }
                $responseData = ['success' => true, 'message' => 'Login successfully'];
            } else {
                $responseData = ['success' => false, 'message' => 'Wrong email or password'];
            }
        } catch (ValidationException $e) {
            $responseData = ['success' => false];
        } catch (Exception $e) {
            $responseData = ['success' => false, 'message' => 'Email or password is wrong. Please try again.'];
        }


        if ($responseData['success']) {
            Session()->flash('success', $responseData['message']);
            if ($user->user_type_id == 1) {
                return redirect()->route('farmer_dashboard');
            } elseif ($user->user_type_id == 2) {
                return redirect()->route('vendor_dashboard');
            }
        } else {
            return back()->with('error', $responseData['message']);
        }
    }

    public function logout()
    {
        Session()->flush();
        return redirect()->intended('/');
    }
}
