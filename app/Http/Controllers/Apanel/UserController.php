<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

class UserController extends Controller
{
    public function view()
    {
        $user = User::get();
        return view('apanel.user.app',['user'=>$user]);
    }

    public function viewDetail($id)
    {
        $list_title = \DB::table('l_title')
            ->get();

        $user = User::with(['profile'])->where('id', $id)->first();

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

        // return response()->json(['user' => $user, 'l_title' => $list_title, 'l_province' => $list_province, 'l_amphure' => $list_amphure, 'l_district' => $list_district]);

        return view('apanel.user.components.detail', ['user' => $user, 'l_title' => $list_title, 'l_province' => $list_province, 'l_amphure' => $list_amphure, 'l_district' => $list_district]);
    }
}
