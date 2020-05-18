<?php

namespace App\Http\Controllers\Apanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationsController extends Controller
{
    public function view()
    {
        $quotation = \App\Quotations::join('l_quotation_status', 'quotations.quotation_status', '=', 'l_quotation_status.id')
            ->whereIn('quotations.quotation_status', [1])
            ->select(
                'quotations.id',
                'quotations.quotation_status',
                'l_quotation_status.name as status'
            )
            ->get();
        return view('apanel.quotations.app', ['quotation' => $quotation]);
    }

    public function detail($id)
    {
        $q_detail = \App\Quotations::join('cust_send_address', 'quotations.send_address', '=', 'cust_send_address.id')
            ->join('l_quotation_status', 'quotations.quotation_status', '=', 'l_quotation_status.id')
            ->leftjoin('l_district', 'cust_send_address.district_id', '=', 'l_district.id')
            ->leftjoin('l_amphure', 'cust_send_address.amphure_id', '=', 'l_amphure.id')
            ->leftjoin('l_province', 'cust_send_address.province_id', '=', 'l_province.id')
            ->where('quotations.id', $id)
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

        $quotationModel = new \App\Quotations();
        $q_pd = $quotationModel->productInQuotation($id);

        return view('apanel.quotations.components.addPrice', ['q_detail' => $q_detail, 'q_pd' => $q_pd]);
    }

    public function storePrice($quotation_id, Request $request)
    {
        foreach ($request->price as $key => $value) {
            $u_q_pd_detail = \App\QuotationProductDetails::find($key);
            $u_q_pd_detail->price_per_unit = $value;
            $u_q_pd_detail->save();
        }

        $u_quotation = \App\Quotations::find($quotation_id);
        $u_quotation->quotation_status = 5;
        $u_quotation->save();


        return redirect()->route('viewQuotationApanel');
    }

    public function addDetail($id, $appointment_id)
    {
        $quotationModel = new \App\Quotations();
        $q_pd = $quotationModel->productInQuotation($id);

        $q_detail = \App\Quotations::find($id);

        return view('apanel.quotations.components.addDetail', ['q_pd' => $q_pd, 'q_detail' => $q_detail, 'appt_id' => $appointment_id]);
    }

    public function storeDetail($id, Request $request)
    {
        foreach ($request->product as $pdkey => $value) {
            $f_quotation_pd = \App\QuotationProducts::where('quotation_products.quotation_id', $id)
                ->where('quotation_products.product_format_id', $value)
                ->first();

            if ($f_quotation_pd) {
                foreach ($request->size[$pdkey] as $skey => $svalue) {
                    $s_quotation_pd_detail = new \App\QuotationProductDetails();
                    $s_quotation_pd_detail->quotation_product_id = $f_quotation_pd->id;
                    $s_quotation_pd_detail->size = $request->size[$pdkey][$skey];
                    $s_quotation_pd_detail->qty = $request->qty[$pdkey][$skey];
                    $s_quotation_pd_detail->save();
                }
            }
        }

        $u_appt = \App\Appointments::find($request->appointment_id);
        $u_appt->appointment_status = 4;
        $u_appt->save();

        $u_quotation = \App\Quotations::find($id);
        $u_quotation->quotation_status = 1;
        $u_quotation->save();

        return redirect()->route('viewQuotationApanel');
    }
}