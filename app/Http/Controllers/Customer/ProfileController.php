<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function view($id)
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

        $user = User::find($id)->with(['profile'])->first();
        return view('customer.profile.app', ['banners' => $banners, 'user' => $user, 'l_title' => $list_title]);
    }

    public function edit($id)
    {
        return '1234';
    }
}