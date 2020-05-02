<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailUserController extends Controller
{
    public function view()
    {
        return view('apanel.detailUser.app',);
    }
}
