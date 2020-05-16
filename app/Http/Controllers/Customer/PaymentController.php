<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function view($id)
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

        $order = \App\Orders::join('quotations', 'orders.quotation_id', '=', 'quotations.id')
            ->join('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->where('orders.id', $id)
            ->whereIn('orders.order_status', [3, 9])
            ->where('quotations.required_by', \Auth::user()->id)
            ->select(
                'orders.id',
                'orders.send_datetime',
                'orders.send_change_datetime',
                'orders.order_status',
                'l_order_status.name as status',
                'orders.remark',
                'orders.amount',
                'orders.created_at'
            )
            ->first();
        if (!$order) {
            return redirect()->back();
        }

        return view('customer.payment.app', ['banners' => $banners, 'order' => $order]);
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->slip->getClientOriginalExtension();
        $request->slip->move(public_path('storage/slip'), $imageName);
        \DB::table('order_payments')->insert([
            'order_id' => $request->order_id,
            'bank_name' => $request->bankname,
            'name_sender' => $request->bank_account,
            'amount' => floatval($request->amount),
            'payment_datetime' => date('Y-m-d H:i:s', strtotime($request->date_transfer . ' ' . $request->time_transfer)),
            'remark' => $request->remark,
            'img_slip' => '/storage/slip/' . $imageName
        ]);

        $UpdateOrder = \App\Orders::find($request->order_id);
        $UpdateOrder->order_status = 4;
        $UpdateOrder->save();

        return redirect()->route('viewOrder');
    }


    public function viewReceipt()
    {
        return view('customer.payment.components.receipt');
    }
}