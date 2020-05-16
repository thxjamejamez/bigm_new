<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function viewDetail()
    {
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

        $appointment = \App\Appointments::join('quotations', 'appointments.quotation_id', '=', 'quotations.id')
            ->join('l_appointment_status', 'appointments.appointment_status', '=', 'l_appointment_status.id')
            ->join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id')
            ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
            ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
            ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
            ->where('quotations.required_by', \Auth::user()->id)
            ->where('appointments.appointment_status', 2)
            ->select(
                'appointments.appointment_datetime',
                'appointments.appointment_status',
                'appointments.appointment_type',
                'l_appointment_status.name as status',
                'cust_send_address.address',
                'cust_send_address.district_id',
                'l_district.name as district_name',
                'cust_send_address.amphure_id',
                'l_amphure.name as amphure_name',
                'cust_send_address.province_id',
                'l_province.name as province_name',
            )
            ->get();

        return view('customer.appointment.app', ['banners' => $banners, 'appointment' => $appointment]);
    }
}