<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Console\Presets\React;

class CartController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ตะกร้าสินค้า',
                'path' => '#'
            ]
        ];

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
            if (!empty($list_send_address)) {
                $can_order = true;
            }
        }

        return view('customer.cart.app', ['banners' => $banners, 'can_order' => $can_order, 'send_address' => $list_send_address]);
    }

    public function updateCart(Request $request)
    {
        $product = \DB::table('products')
            ->where('products.id', $request->product_id)
            ->whereIn('products.created_by', [1, \Auth::user()->id])
            ->first();

        $cart = \Session::get('cart');
        $data = collect($cart);
        if (!empty($cart)) {
            $find = collect($cart)->first(function ($item, $key) use ($request) {
                return $item['product_id'] == $request->product_id;
            });
            if ($find) {
                $data = collect($cart)->map(function ($item, $key) use ($request) {
                    if ($item['product_id'] == $request->product_id) {
                        $item['qty'] += 1;
                    }
                    return $item;
                });
            } else {
                $data->push([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_detail' => $product->detail,
                    'product_size' => $product->size,
                    'qty' => 1,
                    'price' => $product->price,
                    'img_path' => $product->img
                ]);
            }
        } else {
            $data->push([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_detail' => $product->detail,
                'product_size' => $product->size,
                'qty' => 1,
                'price' => $product->price,
                'img_path' => $product->img
            ]);
        }
        \Session::put('cart', $data);
        return back();
    }

    public function clearCart()
    {
        \Session::forget('cart');
        return back();
    }
}