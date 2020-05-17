<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ใบเสนอราคา',
                'path' => '#'
            ]
        ];

        $quotation = \App\Quotations::join('l_quotation_status', 'quotations.quotation_status', '=', 'l_quotation_status.id')
            ->where('quotations.required_by', \Auth::user()->id)
            ->select(
                'quotations.id',
                'quotations.quotation_status',
                'l_quotation_status.name as status'
            )
            ->get();

        return view('customer.quotation.app', ['banners' => $banners, 'quotation' => $quotation]);
    }

    public function viewDetail($id)
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ใบเสนอราคา',
                'path' => route('viewQuotation')
            ],
            2 => [
                'name' => 'รายละเอียดใบเสนอราคา',
                'path' => '#'
            ]
        ];

        $quotation = \App\Quotations::join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id')
            ->join('l_quotation_status', 'quotations.quotation_status', '=', 'l_quotation_status.id')
            ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
            ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
            ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
            ->where('quotations.id', $id)
            ->where('quotations.required_by', \Auth::user()->id)
            ->select(
                'quotations.id',
                'quotations.quotation_status',
                'l_quotation_status.name as status',
                'quotations.quotation_type',
                'cust_send_address.address',
                'cust_send_address.district_id',
                'l_district.name as district_name',
                'cust_send_address.amphure_id',
                'l_amphure.name as amphure_name',
                'cust_send_address.province_id',
                'l_province.name as province_name'
            )
            ->first();

        $quotation_pd = \App\QuotationProducts::with(['details'])
            ->join('product_formats', 'quotation_products.product_format_id', '=', 'product_formats.id')
            ->where('quotation_products.quotation_id', $id)
            ->select(
                'quotation_products.id',
                'quotation_products.product_format_id',
                'product_formats.name as pd_f_name',
                'product_formats.img_path'
            )
            ->get();

        $appointment = [];
        if ($quotation->quotation_type == 2 && in_array($quotation->quotation_status, [2, 3, 4])) {
            $appointment = \App\Appointments::join('quotations', 'appointments.quotation_id', '=', 'quotations.id')
                ->join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id')
                ->leftjoin('l_appointment_status', 'appointments.appointment_status', '=', 'l_appointment_status.id')
                ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
                ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
                ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
                ->where('appointments.quotation_id', $id)
                ->select(
                    'appointments.appointment_datetime',
                    'appointments.appointment_change_datetime',
                    'appointments.appointment_status',
                    'l_appointment_status.name as status',
                    'cust_send_address.address',
                    'cust_send_address.district_id',
                    'l_district.name as district_name',
                    'cust_send_address.amphure_id',
                    'l_amphure.name as amphure_name',
                    'cust_send_address.province_id',
                    'l_province.name as province_name'
                )
                ->first();
        }

        return view('customer.quotation.components.detail', ['banners' => $banners, 'quotation' => $quotation, 'quotation_pd' => $quotation_pd, 'appointment' => $appointment]);
    }

    public function viewAdd($type)
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ขอใบเสนอราคา',
                'path' => '#'
            ]
        ];

        $ProductModels = new \App\Products();
        $product_format = $ProductModels->getProductFormatList();

        $cust_profile = \DB::table('customer_info')
            ->where('customer_info.user_id', \Auth::user()->id)
            ->first();

        $can_order = false;
        $list_send_address = [];
        if (!empty($cust_profile)) {
            $list_send_address = \DB::table('cust_send_address')
                ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
                ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
                ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
                ->where('cust_send_address.cust_id', $cust_profile->id)
                ->where('cust_send_address.active', 1)
                ->orderByDesc('cust_send_address.defualt')
                ->orderByDesc('cust_send_address.id')
                ->select(
                    'cust_send_address.id',
                    'cust_send_address.cust_id',
                    'cust_send_address.address',
                    'cust_send_address.district_id',
                    'l_district.name as district_name',
                    'cust_send_address.amphure_id',
                    'l_amphure.name as amphure_name',
                    'cust_send_address.province_id',
                    'l_province.name as province_name',
                    'cust_send_address.defualt'
                )
                ->get();

            if (count($list_send_address)) {
                $can_order = true;
            }
        }

        if ($type == 1) {
            return view('customer.quotation.components.add1', ['banners' => $banners, 'pd_f' => $product_format, 'can_order' => $can_order, 'send_address' => $list_send_address]);
        } else {
            return view('customer.quotation.components.add2', ['banners' => $banners, 'pd_f' => $product_format, 'can_order' => $can_order, 'send_address' => $list_send_address]);
        }
    }

    public function storeType1(Request $request)
    {
        $s_quotation = new \App\Quotations();
        $s_quotation->required_by = \Auth::user()->id;
        $s_quotation->quotation_type = 1;
        $s_quotation->quotation_status = 1;
        $s_quotation->send_address = $request->cust_send_address;
        $s_quotation->save();

        foreach ($request->product as $pdkey => $value) {
            $s_quotation_pd = new \App\QuotationProducts();
            $s_quotation_pd->quotation_id = $s_quotation->id;
            $s_quotation_pd->product_format_id = $value;
            $s_quotation_pd->save();

            foreach ($request->size[$pdkey] as $skey => $svalue) {
                $s_quotation_pd_detail = new \App\QuotationProductDetails();
                $s_quotation_pd_detail->quotation_product_id = $s_quotation_pd->id;
                $s_quotation_pd_detail->size = $request->size[$pdkey][$skey];
                $s_quotation_pd_detail->qty = $request->qty[$pdkey][$skey];
                $s_quotation_pd_detail->save();
            }
        }
        return redirect()->route('viewQuotation');
    }

    public function storeType2(Request $request)
    {
        $s_quotation = new \App\Quotations();
        $s_quotation->required_by = \Auth::user()->id;
        $s_quotation->quotation_type = 2;
        $s_quotation->quotation_status = 2;
        $s_quotation->send_address = $request->cust_send_address;
        $s_quotation->save();

        foreach ($request->product as $pdkey => $value) {
            $s_quotation_pd = new \App\QuotationProducts();
            $s_quotation_pd->quotation_id = $s_quotation->id;
            $s_quotation_pd->product_format_id = $value;
            $s_quotation_pd->save();
        }

        $s_appointment = new \App\Appointments();
        $s_appointment->quotation_id = $s_quotation->id;
        $s_appointment->appointment_datetime = date('Y-m-d H:i:s', strtotime($request->appointment_dt));
        $s_appointment->appointment_status = 1;
        $s_appointment->appointment_type = 1;
        $s_appointment->save();

        return redirect()->route('viewQuotation');
    }

    public function changeDateAppointment($id)
    {
        $appt = \App\Appointments::join('quotations', 'appointments.quotation_id', '=', 'quotations.id')
            ->where('appointments.quotation_id', $id)
            ->where('quotations.quotation_status', 3)
            ->where('quotations.required_by', \Auth::user()->id)
            ->first();

        if ($appt) {
            \DB::table('appointments')
                ->where('appointments.quotation_id', $id)
                ->update([
                    'appointments.appointment_datetime' => $appt->appointment_change_datetime,
                    'appointments.appointment_change_datetime' => NULL,
                    'appointments.appointment_status' => 1
                ]);

            \DB::table('quotations')
                ->where('quotations.id', $id)
                ->update([
                    'quotations.quotation_status' => 2
                ]);
        }

        return redirect()->route('viewQuotation');
    }

    public function cancelQuotation($id)
    {
        $appt = \App\Quotations::where('quotations.id', $id)
            ->whereNotIn('quotations.quotation_status', [4, 6])
            ->where('quotations.required_by', \Auth::user()->id)
            ->first();
        if ($appt) {
            \DB::table('quotations')
                ->where('quotations.id', $id)
                ->update([
                    'quotations.quotation_status' => 7
                ]);
        }
        return redirect()->route('viewQuotation');
    }
}