<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'รายการคำสั่งซื้อ',
                'path' => '#'
            ]
        ];

        $orders = \App\Orders::join('quotations', 'orders.quotation_id', '=', 'quotations.id')
            ->leftjoin('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->where('quotations.required_by', \Auth::user()->id)
            ->select(
                'orders.id as order_id',
                'orders.created_at',
                'orders.send_datetime',
                'orders.order_status',
                'l_order_status.name as order_status_name'
            )
            ->get();

        if (count($orders)) {
            $orders = collect($orders)->map(function ($item, $key) {
                $item->order_no = $this->getOrderNo($item->order_id);
                $item->sts_class = $this->getStatusClass($item->order_status);
                return $item;
            });
        }

        return view('customer.status.app', ['banners' => $banners, 'orders' => $orders]);
    }

    public function viewDetail($id)
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'รายการคำสั่งซื้อ',
                'path' => '/order'
            ],
            2 => [
                'name' => 'รายละเอียดคำสั่งซื้อ',
                'path' => '#'
            ]
        ];

        $order = \App\Orders::join('quotations', 'orders.quotation_id', '=', 'quotations.id')
            ->join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id')
            ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
            ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
            ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
            ->join('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->where('orders.id', $id)
            ->where('quotations.required_by', \Auth::user()->id)
            ->select(
                'orders.id',
                'orders.send_datetime',
                'orders.send_change_datetime',
                'orders.order_status',
                'l_order_status.name as status',
                'orders.remark',
                'orders.amount',
                'cust_send_address.district_id',
                'l_district.name as district_name',
                'cust_send_address.amphure_id',
                'l_amphure.name as amphure_name',
                'cust_send_address.province_id',
                'l_province.name as province_name',
                'orders.created_at'
            )
            ->first();

        if (!$order) {
            return redirect()->back();
        }

        $OrderModels = new \App\Orders();

        if ($order) {
            $order->order_no = $this->getOrderNo($order->id);
        }

        return view('customer.status.components.orderDetail', ['banners' => $banners, 'order' => $order, 'product' => $OrderModels->getProductInOrder($id, \Auth::user()->id)]);
    }

    public function makeOrder(Request $request, $quotation_id)
    {
        $sum = 0;

        $all_pd_detail = \App\QuotationProducts::join('quotation_product_details', 'quotation_products.id', '=', 'quotation_product_details.quotation_product_id')
            ->where('quotation_products.quotation_id', $quotation_id)
            ->get();

        foreach ($all_pd_detail as $key => $value) {
            $sum += ($value['qty'] * $value['price_per_unit']);
        }

        $UpdateQuotationSts = \App\Quotations::find($quotation_id);
        $UpdateQuotationSts->quotation_status = 6;
        $UpdateQuotationSts->save();

        $s_appointment = new \App\Appointments;
        $s_appointment->quotation_id = $quotation_id;
        $s_appointment->appointment_datetime = date('Y-m-d H:i:s', strtotime($request->install_dt));
        $s_appointment->appointment_status = 1;
        $s_appointment->appointment_type = 2;
        $s_appointment->save();

        $AddOrder = new \App\Orders;
        $AddOrder->quotation_id = $quotation_id;
        $AddOrder->appointment_id = $s_appointment->id;
        $AddOrder->send_datetime = date('Y-m-d H:i:s', strtotime($request->install_dt));
        $AddOrder->order_status = 1;
        $AddOrder->amount = $sum;
        $AddOrder->save();

        return redirect()->route('viewOrder');
    }

    public function changeDateOrder($id)
    {

        $order = \App\Orders::join('quotations', 'orders.quotation_id', '=', 'quotations.id')
            ->whereIn('orders.order_status', [1, 2, 3])
            ->where('orders.id', $id)
            ->where('quotations.required_by', \Auth::user()->id)
            ->first();

        if (!$order) {
            return redirect()->back();
        }

        $UpdateOrder = \App\Orders::find($id);
        $UpdateOrder->send_datetime = $UpdateOrder->send_change_datetime;
        $UpdateOrder->send_change_datetime = NULL;
        $UpdateOrder->order_status = 1;
        $UpdateOrder->save();

        $UpdateAppointment = \App\Appointments::find($UpdateOrder->appointment_id);
        $UpdateAppointment->appointment_datetime = $UpdateOrder->send_datetime;
        $UpdateAppointment->appointment_change_datetime = NULL;
        $UpdateAppointment->appointment_status = 1;
        $UpdateAppointment->save();

        return redirect()->route('viewOrder');
    }

    public function cancelOrder($id)
    {
        $order = \App\Orders::join('quotations', 'orders.quotation_id', '=', 'quotations.id')
            ->whereIn('orders.order_status', [1, 2, 3, 4])
            ->where('orders.id', $id)
            ->where('quotations.required_by', \Auth::user()->id)
            ->first();

        if (!$order) {
            return redirect()->back();
        }

        $UpdateOrder = \App\Orders::find($id);
        $UpdateOrder->order_status = 8;
        $UpdateOrder->save();

        return redirect()->route('viewOrder');
    }

    private function getOrderNo($id)
    {
        return sprintf("ORD%05d", $id);
    }

    private function getStatusClass($status_id)
    {
        if (in_array($status_id, [1, 2, 3, 4, 5, 6])) {
            return 'process';
        } else if ($status_id == 7) {
            return 'success';
        } else {
            return 'unsuccess';
        }
    }
}