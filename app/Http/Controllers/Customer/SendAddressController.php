<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendAddressController extends Controller
{
    public function view()
    {
        $banners = [
            0 => [
                'name' => 'หน้าแรก',
                'path' => '/'
            ],
            1 => [
                'name' => 'ที่อยู่การติดตั้ง',
                'path' => '#'
            ]
        ];

        $cust_profile = $this->getCustID();

        if (empty($cust_profile)) {
            return view('customer.sendAddress.app', ['banners' => $banners, 'permission_add' => false]);
        }

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

        return view('customer.sendAddress.app', ['banners' => $banners, 'permission_add' => true, 'list_address' => $list_send_address]);
    }

    public function add(Request $request)
    {
        $defualt = 0;
        $cust_profile = $this->getCustID();
        if (!empty($cust_profile)) {
            $cust_send_address = \DB::table('cust_send_address')
                ->where('cust_send_address.cust_id', '=', $cust_profile->id)
                ->where('cust_send_address.defualt', 1)
                ->where('cust_send_address.active', 1)
                ->first();

            $defualt = ($cust_send_address) ? 0 : 1;
        }
        \DB::table('cust_send_address')
            ->insert([
                'cust_id' => $cust_profile->id,
                'address' => $request->address,
                'district_id' => $request->district,
                'amphure_id' => $request->amphure,
                'province_id' => $request->province,
                'defualt' => $defualt,
                'active' => 1
            ]);

        return back()->with('created', 'เพิ่มข้อมูลที่อยู่การติดตั้งเรียบร้อยแล้ว');
    }

    public function viewDetail($id)
    {
        $detail = \DB::table('cust_send_address')
            ->where('cust_send_address.id', $id)
            ->first();

        return response()->json([
            'status' => true,
            'data' => $detail
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $updateSendAddress = \App\CustSendAddress::find($id);
        $updateSendAddress->address = $request->address;
        $updateSendAddress->district_id = $request->district;
        $updateSendAddress->amphure_id = $request->amphure;
        $updateSendAddress->province_id = $request->province;
        $updateSendAddress->save();
        return back()->with('updated', 'แก้ไขข้อมูลที่อยู่การติดตั้งเรียบร้อยแล้ว');
    }

    public function remove($id)
    {
        $inactiveSendAddress = \App\CustSendAddress::find($id);
        $inactiveSendAddress->active = 0;
        $inactiveSendAddress->save();
        return back()->with('deleted', 'ลบข้อมูลสำหรับ');
    }

    private function getCustID()
    {
        return \DB::table('customer_info')
            ->where('customer_info.user_id', \Auth::user()->id)
            ->first();
    }
}