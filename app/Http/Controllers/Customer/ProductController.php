<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    
    public function view (){
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'สินค้า',
                'path' => '#'
            ]
        ];

        return view('customer.product.app', ['banners' => $banners]);
    }
}
