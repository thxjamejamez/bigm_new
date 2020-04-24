<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function view (){
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ตะกร้าสินค้า',
                'path' => '#'
            ]
        ];

        return view('customer.cart.app', ['banners' => $banners]);
    }
}
