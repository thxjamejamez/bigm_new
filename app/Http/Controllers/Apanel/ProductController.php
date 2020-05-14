<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function view()
    {

        // form :: where
        $product=\App\Products::where('product_formats.category_id', 1)
            ->join('users', 'product_formats.created_by', '=', 'users.id')
            ->where('product_formats.active', '!=', 0)
            ->select(
                'product_formats.*',
                'users.name as created_by'
            )
            ->get();

        return view('apanel.product.app', ['product' => $product,]);
    }

    public function store (Request $request)
    {
        \DB::table('product_formats')->insert([
            'name' => $request->product_name,
            'img_path' => '/img/defualt_product.jpg',
            'category_id' => 1,
            'created_by' => 1,
            'active' => 1
        ]);

        return redirect()->route('viewProduct');
    }

    public function inactiveProduct($id)
    {
        \DB::table('product_formats')
            ->where('product_formats.id', $id)
            ->update([
                'product_formats.active' => 0
            ]);
        
        return redirect()->route('viewProduct');
        
    }

    // public function viewDetail($id)
    // { 
    //     $product=\App\Products::where('products.id', $id)->first();
    //     return view('apanel.product.components.detail',['product' => $product]);
    // }
}
