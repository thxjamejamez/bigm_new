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
        $product = \DB::table('product_categories')
            ->join('products', 'product_categories.id', '=', 'products.category_id')
            ->where('product_categories.id', 1)
            ->select(
                'product_categories.*',
                'product_categories.name as pd_cate_name',
                'products.*'
            )
            ->get();

        if (isset(\Auth::user()->id)) {
            $custom_product = \DB::table('product_categories')
                ->join('products', 'product_categories.id', '=', 'products.category_id')
                ->where('product_categories.id', 2)
                ->where('products.created_by', \Auth::user()->id)
                ->select(
                    'product_categories.*',
                    'product_categories.name as pd_cate_name',
                    'products.*'
                )
                ->get();

            $product = collect($product)->merge($custom_product);
        }

        return view('customer.product.app', ['banners' => $banners, 'products' => $product->groupBy('pd_cate_name')]);
    }
}