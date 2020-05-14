@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'รายละเอียดคำสั่งซื้อ')

@section('header-css')
<style>
    .text-head {
        color: black;
        font-weight: 600;
        font-size: 17px;
    }
</style>
@endsection

@section('content')
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div>

                <div class="card card-outline-secondary">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">
                            รายละเอียดใบเสนอราคา</p>
                        <hr>
                        <div style="font-size: 16px">
                            <span style="color: black">เลขที่ใบเสนอราคา : </span>
                            <span>{{sprintf("Q%05d", $quotation->id)}}</span>
                        </div>
                        <div style="font-size: 16px;margin-top: 10px">
                            <span style="color: black">ที่อยู่การติดตั้ง : </span> <span>{{$quotation->address}}
                                ต.{{$quotation->district_name}} อ.{{$quotation->amphure_name}}
                                จ.{{$quotation->province_name}}</span>
                        </div>
                        <div style="font-size: 16px;margin-top: 10px">
                            <span style="color: black">สถานะใบเสนอราคา : </span> <span>{{$quotation->status}}</span>
                        </div>
                    </div>
                </div>

                <div class="card card-outline-secondary" style="margin-top: 20px">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">รายละเอียดสินค้า
                        </p>
                        <hr>

                        @foreach ($quotation_pd as $quotation_item)
                        <div class="col-lg-12">
                            <blockquote class="generic-blockquote"
                                style="background-color: rgb(231, 243, 245) !important;border-radius: 5px">

                                <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center">
                                        <img
                                            src="{{($quotation_item->img_path) ? $quotation_item->img_path : '/img/defualt_product.jpg'}}">
                                    </div>

                                    <div class="col-md-8 mb-3">
                                        <div class="head-pddetail row mb-3">
                                            <div class="col-md-6 text-center">
                                                <span class="text-head">
                                                    ขนาดสินค้า
                                                </span>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <span class="text-head">
                                                    จำนวน
                                                </span>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <span class="text-head">
                                                    ราคา
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 text-center">
                                                @foreach ($quotation_item->details as $details_item)
                                                <p>{{$details_item->size}}</p>
                                                @endforeach
                                            </div>

                                            <div class="col-md-3 text-center">
                                                @foreach ($quotation_item->details as $details_item)
                                                <p>{{$details_item->qty}}</p>
                                                @endforeach
                                            </div>

                                            <div class="col-md-3 text-center">
                                                @foreach ($quotation_item->details as $details_item)
                                                <p>{{$details_item->price_per_unit}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </blockquote>
                        </div>
                        @endforeach


                    </div>
                </div>
                <div style="text-align: right">
                    <div>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                            อ่านไม่ออก
                        </button>

                        <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                            อ่านไม่ออก
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>

@endsection

@section('footer-js')
@endsection