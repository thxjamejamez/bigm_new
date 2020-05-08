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

        $orders = \App\Orders::where('orders.order_by', \Auth::user()->id)
            ->leftjoin('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->select(
                'orders.id as order_id',
                'orders.order_date',
                'orders.send_date',
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

        $orderDetail = \App\Orders::with(['details'])
            ->leftjoin('l_order_status', 'orders.order_status', '=', 'l_order_status.id')
            ->where('orders.order_by', \Auth::user()->id)
            ->where('orders.id', $id)
            ->select(
                'orders.*',
                'l_order_status.name as order_status_name'
            )
            ->first();

        if ($orderDetail) {
            $orderDetail->order_no = $this->getOrderNo($orderDetail->id);
        }

        return view('customer.status.components.orderDetail', ['banners' => $banners, 'order' => $orderDetail]);
        // return response()->json($orderDetail);
    }

    public function store(Request $request)
    {
        $AddOrder = new \App\Orders;
        $AddOrder->order_by = \Auth::user()->id;
        $AddOrder->order_date = date("Y-m-d");
        $AddOrder->send_date = date("Y-m-d", strtotime($request->send_date));
        $AddOrder->send_address_id  = $request->cust_send_address;
        $AddOrder->order_status = 1;
        $AddOrder->save();

        foreach ($request->products as $key => $product_id) {
            $product = \App\Products::find($product_id);
            if ($product) {
                $AddOrderDetail = new \App\OrderDetail;
                $AddOrderDetail->order_id = $AddOrder->id;
                $AddOrderDetail->product_id = $product_id;
                $AddOrderDetail->product_name = $product->name;
                $AddOrderDetail->product_size = $product->size;
                $AddOrderDetail->product_img = ($product->img) ? $product->img : '/img/defualt_product.jpg';
                $AddOrderDetail->product_qty = $request->qty[$key];
                $AddOrderDetail->product_price = $product->price;
                $AddOrderDetail->save();
            }
        }

        \Session::forget('cart');

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