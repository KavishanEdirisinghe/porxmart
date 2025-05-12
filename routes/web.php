<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FarmerContoller;
use App\Http\Controllers\FarmlandController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaddyDemandController;
use App\Http\Controllers\PaddyProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home');
});
Route::get('/about-us', function () {
    return view('about-us');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/role-selection/{id}', 'role_selection')->name('role_selection');
    Route::get('/farmer-registration/{id}', 'farmer_registation')->name('farmer_registation');
    Route::get('/vendor-registration/{id}', 'vendor_registation')->name('vendor_registation');

    Route::post('/basic-registration', 'basic_registration')->name('basic_registration');
    Route::post('/farm-land-registration/{id}', 'farm_land_registration')->name('farm_land_registration');
    Route::post('/business-registration/{id}', 'business_registration')->name('business_registration');
    Route::post('/login-process', 'login_process')->name('login_process');



    Route::get('/logOut', 'logout')->name('logout');
});

Route::controller(LocationController::class)->group(function () {
    Route::get('/get-districts/{province}', 'getDistricts');
    Route::get('/get-divisional-secretariats/{district}', 'getDivisionalSecretariats');
    Route::get('/get-grama-niladharis/{ds}', 'getGramaNiladharis');
});


// Farmer
Route::controller(FarmerContoller::class)->middleware('userIsAuth')->group(function () {
    Route::get('/farmer-dashboard', 'dashboard')->name('farmer_dashboard');
});
Route::controller(VendorController::class)->middleware('userIsAuth')->group(function () {
    Route::get('/vendor-dashboard', 'dashboard')->name('vendor_dashboard');
});

Route::controller(FarmlandController::class)->middleware('userIsAuth')->group(function () {
    Route::get('/farm-land', 'index')->name('farm_land');
    Route::post('/farm-land/create/{id}', 'create')->name('farm_land_create');
    Route::get('/farm-land/edit/{id}', 'edit_index')->name('farm_edit_index');
    Route::post('/farm-land/edit/{id}', 'edit')->name('farm_edit');
    Route::post('/farm-land/delete/{id}', 'delete')->name('farm_delete');
});

Route::controller(PaddyProductController::class)->middleware('userIsAuth')->group(function () {
    Route::get('/paddy-product', 'index')->name('paddy_product_index');
    Route::post('/paddy-product/create/{id}', 'create')->name('paddy_product_reate');
    Route::get('/paddy-product/edit/{id}', 'edit_index')->name('paddy_product_edit_index');
    Route::post('/paddy-product/edit/{id}', 'edit')->name('paddy_product_edit');
    Route::post('/paddy-product/delete/{id}', 'delete')->name('paddy_product_delete');
});

Route::controller(BusinessController::class)->middleware('userIsAuth')->group(function () {
    Route::get('/business', 'index')->name('business');
    Route::post('/business/create/{id}', 'create')->name('business_create');
    Route::get('/business/edit/{id}', 'edit_index')->name('business_edit_index');
    Route::post('/business/edit/{id}', 'edit')->name('business_edit');
    Route::post('/business/delete/{id}', 'delete')->name('business_delete');
});

Route::controller(PaddyDemandController::class)->middleware('userIsAuth')->group(function () {
    Route::get('/paddy-demand', 'index')->name('paddy_demand_index');
    Route::post('/paddy-demand/create/{id}', 'create')->name('paddy_demand_create');
    Route::get('/paddy-demand/edit/{id}', 'edit_index')->name('paddy_demand_edit_index');
    Route::post('/paddy-demand/edit/{id}', 'edit')->name('paddy_demand_edit');
    Route::post('/paddy-demand/delete/{id}', 'delete')->name('paddy_demand_delete');
});
