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

    public function store (Request $request)
    {
        \DB::table('order_payments')->insert([
            'order_id' => $request->order_id,
            'bank_name' => $request->bankname,
            'name_sender'=> $request->bank_account,
            'amount' => $request->amount,
            'payment_datetime' => $request->date_transfer,
            'remark' => $request->remark,
            'img_slip' => '/img/defualt_product.jpg',
            'payment_status' => 1,
        
        ]);

        return redirect()->route('payment');
    }


    public function viewReceipt()
    {
        return view('customer.payment.components.receipt');
    }
}
