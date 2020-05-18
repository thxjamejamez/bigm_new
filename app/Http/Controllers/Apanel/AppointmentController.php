<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function view()
    {
        $appointments = \App\Appointments::join('quotations', 'appointments.quotation_id', '=', 'quotations.id')
            ->join('l_appointment_status', 'appointments.appointment_status', '=', 'l_appointment_status.id')
            ->join('users', 'quotations.required_by', '=', 'users.id')
            ->join('customer_info', 'users.id', '=', 'customer_info.user_id')
            ->whereIn('appointments.appointment_status', [1, 2, 3])
            ->select(
                'appointments.id',
                'appointments.quotation_id',
                'customer_info.first_name',
                'customer_info.last_name',
                'customer_info.tel',
                'appointments.appointment_datetime',
                'l_appointment_status.name as status',
                'appointments.appointment_type'
            )
            ->get();

        return view('apanel.appointment.app', ['appointments' => $appointments]);
    }

    public function viewDetail($id, $type)
    {
        $appointmentDetail = \App\Appointments::join('l_appointment_status', 'appointments.appointment_status', '=', 'l_appointment_status.id')
            ->join('quotations', 'appointments.quotation_id', '=', 'quotations.id')
            ->join('users', 'quotations.required_by', '=', 'users.id')
            ->join('customer_info', 'users.id', '=', 'customer_info.user_id')
            ->join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id')
            ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
            ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
            ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
            ->where('appointments.id', $id)
            ->select(
                'appointments.id',
                'quotations.id as quotation_id',
                'customer_info.first_name',
                'customer_info.last_name',
                'customer_info.tel',
                'appointments.appointment_datetime',
                'appointments.appointment_change_datetime',
                'appointments.appointment_status',
                'l_appointment_status.name as status',
                'appointments.appointment_type',
                'cust_send_address.address',
                'cust_send_address.district_id',
                'l_district.name as district_name',
                'cust_send_address.amphure_id',
                'l_amphure.name as amphure_name',
                'cust_send_address.province_id',
                'l_province.name as province_name'
            )
            ->first();
        $QuotationModel = new \App\Quotations();
        $Product = $QuotationModel->productInQuotation($appointmentDetail->quotation_id);

        return view('apanel.appointment.components.detail', ['appointmentDetail' => $appointmentDetail, 'product' => $Product]);
    }

    public function cancel($id, $type)
    {
        $appointment = \App\Appointments::find($id);
        $appointment->appointment_status = 5;
        $appointment->save();
        if ($type == 1) {
            $quotation = \App\Quotations::find($appointment->quotation_id);
            $quotation->quotation_status = 7;
            $quotation->save();
        } else {
            \App\Orders::where('orders.quotation_id', $appointment->quotation_id)
                ->update(['order_status' => 8]);
        }

        return redirect()->route('viewApanelAppointment');
    }

    public function accept($id, $type)
    {
        $appointment = \App\Appointments::find($id);
        $appointment->appointment_status = 3;
        $appointment->save();
        if ($type == 1) {
            $quotation = \App\Quotations::find($appointment->quotation_id);
            $quotation->quotation_status = 4;
            $quotation->save();
        } else {
            \App\Orders::where('orders.quotation_id', $appointment->quotation_id)
                ->update(['order_status' => 3]);
        }
        return redirect()->route('viewApanelAppointment');
    }

    public function chagedate($id, $type, Request $request)
    {
        $appointment = \App\Appointments::find($id);
        $appointment->appointment_status = 2;
        $appointment->appointment_change_datetime = date('Y-m-d H:i:s', strtotime($request->change_date));
        $appointment->save();
        if ($type == 1) {
            $quotation = \App\Quotations::find($appointment->quotation_id);
            $quotation->quotation_status = 3;
            $quotation->save();
        } else {
            $order = \App\Orders::find($appointment->quotation_id);
            $order->order_status = 2;
            $order->send_change_datetime = date('Y-m-d H:i:s', strtotime($request->change_date));
            $order->save();
        }
        return redirect()->route('viewApanelAppointment');
    }
}