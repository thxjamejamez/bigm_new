<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function GetAmphureList($province_id)
    {
        try {
            $amphure_by_province = \DB::table('l_amphure')
                ->where('l_amphure.province_id', $province_id)
                ->get();

            return response()->json([
                "status" => true,
                "data" => $amphure_by_province
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                "status" => false,
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function GetDistrictList($amphure_id)
    {
        try {
            $district_by_amphure = \DB::table('l_district')
                ->where('l_district.amphure_id', $amphure_id)
                ->get();

            return response()->json([
                "status" => true,
                "data" => $district_by_amphure
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                "status" => false,
                "error" => $e->getMessage()
            ], 400);
        }
    }
}