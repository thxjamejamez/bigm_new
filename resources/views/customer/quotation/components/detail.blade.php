@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'รายละเอียดคำสั่งซื้อ')

@section('header-css')
@endsection

@section('content')
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div >
      
                <div class="card card-outline-secondary">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">รายละเอียดใบเสนอราคา</p>
                        <hr>
                        <div style="font-size: 16px">
                            <span style="color: black">เลขที่ใบเสนอราคา : </span> <span>เลขที่ใบเสนอราคา</span>
                        </div>
                        <div style="font-size: 16px;margin-top: 10px">
                            <span style="color: black">ที่อยู่การติดตั้ง : </span> <span>เลขที่ใบเสนอราคา</span>
                        </div>
                        <div style="font-size: 16px;margin-top: 10px">
                            <span style="color: black">สถานะใบเสนอราคา : </span> <span>เลขที่ใบเสนอราคา</span>
                        </div>
                    </div>
                </div>

                <div class="card card-outline-secondary" style="margin-top: 20px">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">รายละเอียดสินค้า</p>
                        <hr>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <blockquote class="generic-blockquote" style="background-color: rgb(231, 243, 245) !important;border-radius: 5px">
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center" style="    justify-content: space-around;">
                                               <img style="height: 100px;width: 150px;" src="https://i.ytimg.com/vi/P5NDgc6kEVM/maxresdefault.jpg">
                                            </div>  
                                            <div class="col-md-3 d-flex align-items-center" style="    justify-content: space-around;">
                                                ขนาด 10*200  เซนติเมตร
                                            </div>  
                                            <div class="col-md-2 d-flex align-items-center" style="    justify-content: space-around;">
                                                จำนวน   5  ชิ้น
                                            </div>  
                                            <div class="col-md-3 d-flex align-items-center" style="    justify-content: space-around;">
                                                ราคา   200  บาท
                                            </div>  
                                        </div>
                                    </blockquote>
                                </div>

                                <div class="col-lg-12">
                                    <blockquote class="generic-blockquote" style="background-color: rgb(231, 243, 245) !important;border-radius: 5px">
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center" style="    justify-content: space-around;">
                                               <img style="height: 100px;width: 150px;" src="https://i.ytimg.com/vi/P5NDgc6kEVM/maxresdefault.jpg">
                                            </div>  
                                            <div class="col-md-3 d-flex align-items-center" style="    justify-content: space-around;">
                                                ขนาด 10*200  เซนติเมตร
                                            </div>  
                                            <div class="col-md-2 d-flex align-items-center" style="    justify-content: space-around;">
                                                จำนวน   5  ชิ้น
                                            </div>  
                                            <div class="col-md-3 d-flex align-items-center" style="    justify-content: space-around;">
                                                ราคา   200  บาท
                                            </div>  
                                        </div>
                                    </blockquote>
                                </div>
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