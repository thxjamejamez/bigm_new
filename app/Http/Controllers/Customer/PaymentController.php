<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'เเจ้งชำระเงิน',
                'path' => '#'
            ]
        ];

        return view('customer.payment.app', ['banners' => $banners]);
    }
}
