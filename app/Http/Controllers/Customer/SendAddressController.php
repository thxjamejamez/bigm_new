<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendAddressController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ที่อยู่การติดตั้ง',
                'path' => '#'
            ]
        ];

        $cust_id = \DB::table('customer_info')
            ->where('customer_info.user_id', \Auth::user()->id)
            ->first();

        if (empty($cust_id)) {
            return view('customer.sendAddress.app', ['banners' => $banners, 'permission_add' => false]);
        }

        $list_send_address = \DB::table('cust_send_address')
            ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
            ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
            ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
            ->where('cust_send_address.cust_id', $cust_id->id)
            ->orderBy('cust_send_address.defualt')
            ->orderByDesc('cust_send_address.id')
            ->get();

        return response()->json($list_send_address);

        return view('customer.sendAddress.app', ['banners' => $banners, 'permission_add' => true, 'list_address' => $list_send_address]);
    }
}
