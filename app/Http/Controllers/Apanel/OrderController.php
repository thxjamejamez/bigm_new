<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function view()
    {
        $order = \App\Orders::join('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->whereIn('orders.order_status', [5, 6, 7, 8])
            ->select(
                'orders.id',
                'orders.order_status',
                'l_order_status.name as status'
            )
            ->get();
        return view('apanel.order.app', ['order' => $order]);
    }

    public function viewDtail($id)
    {
        $order = \App\Orders::join('quotations', 'orders.quotation_id', '=', 'quotations.id')
            ->join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id')
            ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
            ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
            ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
            ->join('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->where('orders.id', $id)
            ->select(
                'orders.id',
                'orders.send_datetime',
                'orders.send_change_datetime',
                'orders.order_status',
                'l_order_status.name as status',
                'orders.remark',
                'orders.amount',
                'cust_send_address.address',
                'cust_send_address.district_id',
                'l_district.name as district_name',
                'cust_send_address.amphure_id',
                'l_amphure.name as amphure_name',
                'cust_send_address.province_id',
                'l_province.name as province_name',
                'orders.created_at'
            )
            ->first();

        $OrderModels = new \App\Orders();
        $product = $OrderModels->getProductInOrder($id);
        return view('apanel.order.components.detail', ['order' => $order, 'product' => $product]);
    }

    public function changeOrderToDone($order_id)
    {
        \DB::table('orders')
            ->where('orders.id', $order_id)
            ->update([
                'order_status' => 6
            ]);
        return redirect()->route('viewOrderApanel');
    }

    public function changeOrderToInstalled($appointment_id)
    {
        \DB::table('orders')
            ->where('orders.appointment_id', $appointment_id)
            ->update([
                'order_status' => 7
            ]);

        \DB::table('appointments')
            ->where('appointments.id', $appointment_id)
            ->update([
                'appointment_status' => 4
            ]);
        return redirect()->route('viewApanelAppointment');
    }
}
