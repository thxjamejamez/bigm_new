<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummaryReportController extends Controller
{
    public function index()
    {
        return view('apanel/reports/summary');
    }

    public function getsalesummary()
    {
        $data = \App\Orders::join('order_payments', 'orders.id', '=', 'order_payments.order_id')
            ->whereIn('orders.order_status', [5, 6, 7])
            ->select(
                'order_payments.payment_datetime as order_date',
                'orders.id as order_no',
                'orders.amount as sum'
            )
            ->get();
        return response()->json(['order' => $data]);
    }
}
