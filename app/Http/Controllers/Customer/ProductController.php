<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'สินค้า',
                'path' => '#'
            ]
        ];



        // $product_by_cate = \App\ProductCate::with(['products' => function ($q) {
        //     $q->when(isset(\Auth::user()->id), function ($query) {
        //         return $query->where('created_by', \Auth::user()->id);
        //     });
        // }])->get();

        $product_by_cate = \App\ProductCate::with('products')->get();
        $product_by_cate->map(function ($item, $key) {
            return $role = 123;
        });

        return response()->json($product_by_cate);

        return view('customer.product.app', ['banners' => $banners, 'products' => $product_by_cate]);
    }
}