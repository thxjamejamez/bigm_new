<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
   public function viewDetail(){
    $banners = [
        0 => [
            'name' => 'หน้าแรก',
            'path' => '/'
        ],
        1 => [
            'name' => 'รายการนัดหมาย',
            'path' => '#'
        ]
    ];


    return view('customer.appointment.app', ['banners' => $banners]);
   }
}
