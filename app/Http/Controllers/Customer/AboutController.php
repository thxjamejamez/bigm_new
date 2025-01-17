<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'เกี่ยวกับเรา',
                'path' => '#'
            ]
        ];

        return view('customer.aboutme.app', ['banners' => $banners]);
    }
}
