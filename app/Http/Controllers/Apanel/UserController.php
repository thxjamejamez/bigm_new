<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;
use \App\Custinfo;

class UserController extends Controller
{
    public function view()
    {

        $userInfor = User::where('users.type', 2)
            ->where('users.active', 1)
            ->get();

        return view('apanel.user.app', ['userInfor' => $userInfor]);
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

        return view('apanel.user.components.detail', ['user' => $user, 'l_title' => $list_title, 'l_province' => $list_province, 'l_amphure' => $list_amphure, 'l_district' => $list_district]);
    }

    public function edit($id, Request $request)
    {
        $profile = \App\Custinfo::where('customer_info.user_id', $id)->first();

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
            $profile->user_id = $id;
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

        return redirect()->route('viewUser')->with('updated', 'done');
    }

    public function remove($id)
    {
        $inactiveUser = \App\User::find($id);
        $inactiveUser->active = 0;
        $inactiveUser->save();

        return redirect()->route('viewUser')->with('removed', 'done');
    }
}
