@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <section class="portfolio-area" id="portfolio">
                <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content">
		                    <div class="title text-center">
		                        <p style="font-size: 25px;font-weight: bold;color: black" class="mb-10">สถานะ</p>
		                    </div>
		                </div>
		            </div>
                    
                    <div class="filters">
                        <ul>
                            <li style="font-size: 16px" class="active" data-filter="*">สถานะทั้งหมด</li>
                            <li style="font-size: 16px" data-filter=".vector">กำลังดำเนินการ</li>
                            <li style="font-size: 16px" data-filter=".raster">ติดตั้งเสร็จเเล้ว</li>
                            <li style="font-size: 16px" data-filter=".ui">ถูกยกเลิก</li>
                        </ul>
                    </div>
                    
                    <div class="filters-content">
                        <div class="row grid">
                            <div class="single-portfolio col-sm-12 all vector">
                                <div class="single-portfolio col-sm-12 ">
                                    <div class="relative">
                                        <div class="col-md-12">
                                            <div class="row mt-2" style="background-color: #60ebfd30;height: 100px;border-radius: 10px">
                                                <div class="col-md-10 " style="word-wrap:break-word;align-self: center;">
                                                    <div>
                                                        ชื่อสินค้า : ประตูหน้าต่าง
                                                    </div>
                                                    <div>
                                                        วันที่ทำรายการ : 20 เมษายน 2563
                                                    </div>
                                                    <div>
                                                        วันที่ทำการติดตั้ง : 27 เมษายน 2563
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center" style="justify-content: space-around;">
                                                    <div style="background-color: #f4e700;color: white;padding: 5px;border-radius: 5px">
                                                        กำลังดำเนินการ
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>				                               
                            </div>

                            <div class="single-portfolio col-sm-12 all raster">
                                <div class="single-portfolio col-sm-12 ">
                                    <div class="relative">
                                        <div class="col-md-12">
                                            <div class="row mt-2" style="background-color: #60ebfd30;height: 100px;border-radius: 10px">
                                                <div class="col-md-10 " style="word-wrap:break-word;align-self: center;">
                                                    <div>
                                                        ชื่อสินค้า : ประตูหน้าต่าง
                                                    </div>
                                                    <div>
                                                        วันที่ทำรายการ : 20 เมษายน 2563
                                                    </div>
                                                    <div>
                                                        วันที่ทำการติดตั้ง : 27 เมษายน 2563
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center" style="justify-content: space-around;">
                                                    <div style="background-color: #00b555;color: white;padding: 5px;border-radius: 5px">
                                                        ติดตั้งเสร็จเเล้ว
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>				                               
                            </div>

                            <div class="single-portfolio col-sm-12 all ui">
                                <div class="single-portfolio col-sm-12 ">
                                    <div class="relative">
                                        <div class="col-md-12">
                                            <div class="row mt-2" style="background-color: #60ebfd30;height: 100px;border-radius: 10px">
                                                <div class="col-md-10 " style="word-wrap:break-word;align-self: center;">
                                                    <div>
                                                        ชื่อสินค้า : ประตูหน้าต่าง
                                                    </div>
                                                    <div>
                                                        วันที่ทำรายการ : 20 เมษายน 2563
                                                    </div>
                                                    <div>
                                                        วันที่ทำการติดตั้ง : 27 เมษายน 2563
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center" style="justify-content: space-around;">
                                                    <div style="background-color:red;color: white;padding: 5px;border-radius: 5px">
                                                        รายการถูกยกเลิก
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>				                               
                            </div>

                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End portfolio-area Area -->	
        </div>
    </div>
</div>
@endsection

@section('footer-js')

@endsection