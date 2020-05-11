<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ใบเสนอราคา',
                'path' => '#'
            ]
        ];
        return view('customer.quotation.app', ['banners' => $banners]);
    }
}
