<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckPayMentController extends Controller
{
    public function view()
    {
        $order = \App\OrderPayment::join('orders', 'order_payments.order_id', '=', 'orders.id')
            ->join('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->whereIn('orders.order_status', [4, 9])
            ->select(
                'orders.id',
                'orders.order_status',
                'orders.amount',
                'orders.order_status',
                'l_order_status.name as status'
            )
            ->get();
        return view('apanel.checkPayMent.app', ['order' => $order]);
    }

    public function viewDetail($id)
    {
        $detail = \App\OrderPayment::join('orders', 'order_payments.order_id', '=', 'orders.id')
            ->join('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->where('order_payments.order_id', $id)
            ->select(
                'orders.id',
                'orders.amount',
                'order_payments.bank_name',
                'order_payments.name_sender',
                'order_payments.amount as send_amount',
                'order_payments.payment_datetime',
                'order_payments.remark',
                'order_payments.img_slip',
                'orders.order_status',
                'l_order_status.name as status'
            )
            ->first();
        return view('apanel.checkPayMent.components.detail', ['order_detail' => $detail]);
    }

    public function PaymentSuccess($id)
    {
        \DB::table('orders')
            ->where('orders.id', $id)
            ->update([
                'orders.order_status' => 5
            ]);
        return redirect()->route('viewCheckPayment');
    }

    public function PaymentInvalid($id)
    {
        \DB::table('orders')
            ->where('orders.id', $id)
            ->update([
                'orders.order_status' => 9
            ]);

        $d_orderpay = \App\OrderPayment::where('order_payments.order_id', $id)->first();
        $img_path_slip = public_path() . $d_orderpay->img_slip;
        unlink($img_path_slip);
        \DB::table('order_payments')
            ->where('order_payments.order_id', $id)
            ->delete();

        return redirect()->route('viewCheckPayment');
    }
}
