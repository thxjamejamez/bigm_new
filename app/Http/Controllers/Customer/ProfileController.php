<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'แก้ไขข้อมูลส่วนตัว',
                'path' => '#'
            ]
        ];

        $list_title = \DB::table('l_title')
            ->get();

            
        $user = User::with(['profile'])->where('id', \Auth::user()->id)->first();

        $list_province = \DB::table('l_province')
            ->get();
    
        $list_amphure = \DB::table('l_amphure')
            ->when(isset($user->profile->province_id), function ($q) use ($user) {
                $q->where('l_amphure.province_id', $user->profile->province_id);
            })
            ->get();

        $list_district = \DB::table('l_district')
            ->when(isset($user->profile->amphure_id), function ($q) use ($user) {
                $q->where('l_district.amphure_id', $user->profile->amphure_id);
            })
            ->get();

        return view('customer.profile.app', ['banners' => $banners, 'user' => $user, 'l_title' => $list_title, 'l_province' => $list_province, 'l_amphure' => $list_amphure, 'l_district' => $list_district]);
    }

    public function edit(Request $request)
    {
        try {
            $profile = \App\Custinfo::where('customer_info.user_id', \Auth::user()->id)->first();

            if (!empty($profile)) {
                $profile->title_id = $request['title'];
                $profile->first_name = $request['first_name'];
                $profile->last_name = $request['last_name'];
                $profile->birthdate = ($request['birth_date']) ? date('Y-m-d H:i:s', strtotime($request['birth_date'])) : NULL;
                $profile->address = $request['address'];
                $profile->district_id = $request['district'];
                $profile->amphure_id = $request['amphure'];
                $profile->province_id = $request['province'];
                $profile->tel = $request['tel'];
            } else {

                $profile = new \App\Custinfo;
                $profile->user_id = \Auth::user()->id;
                $profile->title_id = $request['title'];
                $profile->first_name = $request['first_name'];
                $profile->last_name = $request['last_name'];
                $profile->birthdate = ($request['birth_date']) ? date('Y-m-d H:i:s', strtotime($request['birth_date'])) : NULL;
                $profile->address = $request['address'];
                $profile->district_id = $request['district'];
                $profile->amphure_id = $request['amphure'];
                $profile->province_id = $request['province'];
                $profile->tel = $request['tel'];
            }

            $profile->save();

            return back()->with('success', 'อัพเดตข้อมูลเรียบร้อยแล้ว');
        } catch (\Throwable $e) {
            response()->json([
                "status" => false,
                "error" => $e->getMessage()
            ], 400);
        }
    }
}
