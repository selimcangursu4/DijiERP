<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class LocationController extends Controller
{
    public function getDistricts($cityId)
    {
        $districts = District::where('sehir_id', $cityId)
            ->orderBy('baslik')
            ->get();

        return response()->json($districts);
    }
}
