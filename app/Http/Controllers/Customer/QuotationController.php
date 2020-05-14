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

        $ProductModels = new \App\Products();
        $product_format = $ProductModels->getProductFormatList();

        $cust_profile = \DB::table('customer_info')
            ->where('customer_info.user_id', \Auth::user()->id)
            ->first();

        $can_order = false;
        $list_send_address = [];
        if (!empty($cust_profile)) {
            $list_send_address = \DB::table('cust_send_address')
                ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
                ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
                ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
                ->where('cust_send_address.cust_id', $cust_profile->id)
                ->where('cust_send_address.active', 1)
                ->orderByDesc('cust_send_address.defualt')
                ->orderByDesc('cust_send_address.id')
                ->select(
                    'cust_send_address.id',
                    'cust_send_address.cust_id',
                    'cust_send_address.address',
                    'cust_send_address.district_id',
                    'l_district.name as district_name',
                    'cust_send_address.amphure_id',
                    'l_amphure.name as amphure_name',
                    'cust_send_address.province_id',
                    'l_province.name as province_name',
                    'cust_send_address.defualt'
                )
                ->get();

            if (count($list_send_address)) {
                $can_order = true;
            }
        }

        if ($type == 1) {
            return view('customer.quotation.components.add1', ['banners' => $banners, 'pd_f' => $product_format, 'can_order' => $can_order, 'send_address' => $list_send_address]);
        } else {
            return view('customer.quotation.components.add2', ['banners' => $banners, 'pd_f' => $product_format, 'can_order' => $can_order, 'send_address' => $list_send_address]);
        }
    }

    public function viewDetail($id) {
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

    public function getQuotationlist()
    {
        return response()->json('12344');
    }
}
