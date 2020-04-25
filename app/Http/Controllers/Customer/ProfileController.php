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

        $user = User::find(\Auth::user()->id)->with(['profile'])->first();
        return view('customer.profile.app', ['banners' => $banners, 'user' => $user, 'l_title' => $list_title, 'l_province' => $list_province]);
    }

    public function edit(Request $request)
    {
        // return response()->json($request['title']);
        \App\Custinfo::updateOrCreate([
            'user_id' => \Auth::user()->id
        ], [
            'title_id' => $request['title'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'birthdate' => $request['birth_date'],
            'address' => $request['address'],
            'district_id ' => $request['district'],
            'tel' => $request['tel'],
        ]);
    }
}
