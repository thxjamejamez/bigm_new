<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function view()
    {
        return view('apanel.order.app',);
    }

    public function viewDtail()
    {
        return view('apanel.order.components.detail',);
    }
}
