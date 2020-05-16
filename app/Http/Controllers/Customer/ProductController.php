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

        $product = \DB::table('product_categories')
            ->join('product_formats', 'product_categories.id', '=', 'product_formats.category_id')
            ->where('product_categories.id', 1)
            ->select(
                'product_categories.*',
                'product_categories.name as pd_cate_name',
                'product_formats.*'
            )
            ->get();

        if (isset(\Auth::user()->id)) {
            $custom_product = \DB::table('product_categories')
                ->join('product_formats', 'product_categories.id', '=', 'product_formats.category_id')
                ->where('product_categories.id', 2)
                ->where('product_formats.created_by', \Auth::user()->id)
                ->select(
                    'product_categories.*',
                    'product_categories.name as pd_cate_name',
                    'product_formats.*'
                )
                ->get();

            $product = collect($product)->merge($custom_product);
        }

        return view('customer.product.app', ['banners' => $banners, 'products' => $product->groupBy('pd_cate_name')]);
    }


    public function customProduct()
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

        return view('customer.product.components.costom', ['banners' => $banners]);
    }


    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->product_img->getClientOriginalExtension();
        $request->product_img->move(public_path('img/product'), $imageName);
        \DB::table('product_formats')->insert([
            'name' => $request->product_name,
            'img_path' => '/img/product/' . $imageName,
            'category_id' => 2,
            'created_by' => \Auth::user()->id,
            'active' => 1
        ]);

        return redirect()->route('viewProductCust');
    }
}