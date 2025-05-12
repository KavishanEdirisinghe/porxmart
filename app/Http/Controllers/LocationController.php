<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Divisional_secretariat;
use App\Models\Grama_niladhari_division;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistricts($provinceId)
    {
        return District::where('province_id', $provinceId)->get();
    }

    public function getDivisionalSecretariats($districtId)
    {
        return Divisional_secretariat::where('district_id', $districtId)->get();
    }

    public function getGramaNiladharis($dsId)
    {
        return Grama_niladhari_division::where('divisional_secretariat_id', $dsId)->get();
    }
}
