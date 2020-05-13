<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationsController extends Controller
{
    public function view()
    {

        // form :: where
        // $product=\App\Products::where('products.category_id', 1)->get();

        // return response()->json($product);
        return view('apanel.quotations.app');
    }

    public function viewDetail()
    {

        // form :: where
        // $product=\App\Products::where('products.category_id', 1)->get();

        // return response()->json($product);
        return view('apanel.quotations.components.detail');
    }
}
