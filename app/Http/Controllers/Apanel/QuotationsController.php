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
                ->join('customer_info', 'users.id', '=', 'customer_info.user_id') 
                ->get();
        // return response()->json($quotations);

        return view('apanel.quotations.app',['appointments'=>$quotations]);
    }

    public function viewDetail()
    {
        $quotationsDetail=\App\Appointments::where('appointments.appointment_status', 1)
                ->join('quotations', 'appointments.quotation_id', '=', 'quotations.id') 
                ->join('users', 'quotations.required_by', '=', 'users.id') 
                ->join('customer_info', 'users.id', '=', 'customer_info.user_id')
                ->join('quotation_products', 'quotations.id', '=', 'quotation_products.quotation_id')
                ->join('product_formats', 'quotation_products.product_format_id', '=', 'product_formats.id')  
                ->join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id') 
                ->select(
                    'appointments.*',
                    'quotations.*',
                    'users.*',
                    'customer_info.*',
                    'quotation_products.*',
                    'product_formats.name as pd_cate_name',
                    'product_formats.img_path as img_path',
                    'cust_send_address.address as address',
                )   
                ->get();
        // return response()->json($quotationsDetail);


        return view('apanel.quotations.components.detail',['quotationsDetail'=>$quotationsDetail]);
    }
}
