<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function view()
    {
        return view('apanel.product.app',);
    }

    public function viewDetail()
    {
        return view('apanel.product.components.detail',);
    }
}
