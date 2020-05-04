<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
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
                $AddOrderDetail->product_qty = $request->qty[$key];
                $AddOrderDetail->product_price = $product->price;
                $AddOrderDetail->save();
            }
        }

        \Session::forget('cart');
        return response()->json($AddOrder);
    }
}
