<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function edit($id)
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

        $user = User::find($id)->with(['profile'])->first();
        return response()->json($user);
        return view('customer.profile.app', ['banners' => $banners, 'user' => $user]);
    }
}