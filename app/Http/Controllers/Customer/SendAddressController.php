<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendAddressController extends Controller
{
    public function view (){
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ที่อยู่',
                'path' => '#'
            ]
        ];

        return view('customer.sendAddress.app', ['banners' => $banners]);
    }
}
