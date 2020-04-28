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
            ->where('cust_send_address.cust_id', $cust_id->id)
            ->orderBy('cust_send_address.defualt')
            ->get();

        return view('customer.sendAddress.app', ['banners' => $banners, 'permission_add' => true, 'list_address' => $list_send_address]);
    }
}