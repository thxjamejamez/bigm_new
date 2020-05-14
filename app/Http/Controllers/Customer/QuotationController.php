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

    public function viewAdd($type)
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ขอใบเสนอราคา',
                'path' => '#'
            ]
        ];
        if ($type == 1) {
            return view('customer.quotation.components.add1', ['banners' => $banners]);
        } else {
            return view('customer.quotation.components.add2', ['banners' => $banners]);
        }
    }

    public function getQuotationlist()
    {
        return response()->json('12344');
    }

    public function getProductFormatList()
    {
        $ProductModels = new \App\Products();
        return response()->json($ProductModels->getProductFormatList());
    }


    public function viewDetail()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'รายละเอียดใบเสนอราคา',
                'path' => '#'
            ]
        ];
        return view('customer.quotation.components.detail', ['banners' => $banners]);
    }
}
