<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function view (){
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ติดต่อเรา',
                'path' => '#'
            ]
        ];

        return view('customer.contact.app', ['banners' => $banners]);
    }
}
