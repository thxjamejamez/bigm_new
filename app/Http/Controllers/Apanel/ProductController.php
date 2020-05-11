<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function view()
    {

        // form :: where
        $product=\App\Products::where('products.category_id', 1)->get();

        // return response()->json($product);
        return view('apanel.product.app', ['product' => $product]);
    }

    public function viewDetail($id)
    { 
        $product=\App\Products::where('products.id', $id)->first();
        return view('apanel.product.components.detail',['product' => $product]);
    }
}
