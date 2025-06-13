<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Wards;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function getDistricts(Request $request)
    {
        $province_id = $request->province_id;

        $districts = DB::table('district')
            ->where('province_id', $province_id)
            ->select('district_id as id', 'name')
            ->get();

        return response()->json($districts);
    }

    public function getWards(Request $request)
    {
        $district_id = $request->district_id;

        $wards = DB::table('wards')
            ->where('district_id', $district_id)
            ->select('wards_id as id', 'name')
            ->get();

        return response()->json($wards);
    }
}
