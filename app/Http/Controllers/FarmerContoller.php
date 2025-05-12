<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmerContoller extends Controller
{
    public function dashboard()
    {
        return view('Farmer.dashboard');
    }
}
