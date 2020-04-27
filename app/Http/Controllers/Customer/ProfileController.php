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

        $list_province = \DB::table('l_province')
            ->get();

        $user = User::with(['profile'])->where('id', \Auth::user()->id)->first();
        // if (isset($user->profile->district_id)) {
        //     $list_amphure = \DB::table('l_district')->where('l_district.')
        // }
        return view('customer.profile.app', ['banners' => $banners, 'user' => $user, 'l_title' => $list_title, 'l_province' => $list_province]);
    }

    public function edit(Request $request)
    {
        try {
            $profile = \App\Custinfo::find(1);

            if ($profile) {
                $profile->title_id = $request['title'];
                $profile->first_name = $request['first_name'];
                $profile->last_name = $request['last_name'];
                $profile->birthdate = ($request['birth_date']) ? date('Y-m-d H:i:s', strtotime($request['birth_date'])) : NULL;
                $profile->address = $request['address'];
                $profile->district_id = $request['district'];
                $profile->tel = $request['tel'];
            } else {
                $profile = new \App\Custinfo;
                $profile->title_id = $request['title'];
                $profile->first_name = $request['first_name'];
                $profile->last_name = $request['last_name'];
                $profile->birthdate = ($request['birth_date']) ? date('Y-m-d H:i:s', strtotime($request['birth_date'])) : NULL;
                $profile->address = $request['address'];
                $profile->district_id = $request['district'];
                $profile->tel = $request['tel'];
            }
            $profile->save();

            return back();
        } catch (\Throwable $e) {
            response()->json([
                "status" => false,
                "error" => $e->getMessage()
            ], 400);
        }
    }
}