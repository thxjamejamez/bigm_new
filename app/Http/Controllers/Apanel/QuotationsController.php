<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationsController extends Controller
{
    public function view()
    {

        // form :: where
        $quotations=\App\Appointments::where('appointments.appointment_status', 1)
                ->join('quotations', 'appointments.quotation_id', '=', 'quotations.id') 
                ->join('users', 'quotations.required_by', '=', 'users.id') 
                // ->join('customer_info', 'users.id', '=', 'customer_info.id') 
                ->get();
        return response()->json($quotations);

        return view('apanel.quotations.app',['appointments'=>$quotations]);
    }

    public function viewDetail()
    {

        // form :: where
        // $product=\App\Products::where('products.category_id', 1)->get();

        // return response()->json($product);
        return view('apanel.quotations.components.detail');
    }
}
