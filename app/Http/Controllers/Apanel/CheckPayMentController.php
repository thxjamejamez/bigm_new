<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckPayMentController extends Controller
{
    public function view()
    {
        return view('apanel.checkPayMent.app',);
    }

    public function viewDetail()
    {

        return view('apanel.checkPayMent.components.detail',);
    }
}
