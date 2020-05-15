@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')
<style>
    div.st-label {
        color: white;
        padding: 5px;
        border-radius: 5px;
    }

    .st-process {
        background-color: #f4e700;
    }

    .st-success {
        background-color: #00b555;
    }

    .st-unsuccess {
        background-color: red;
    }
</style>
@endsection

@section('content')
<div id="app" class="whole-wrap">
    <blog-post title="My journey with Vue"></blog-post>
    <div class="container">
        <div class="section-top-border">
            <section class="portfolio-area" id="portfolio">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content">
                            <div class="title text-center">
                                <p style="font-size: 25px;font-weight: bold;color: black" class="mb-10">
                                    สถานะรายการคำสั่งซื้อ
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="filters">
                        <ul>
                            <li style="font-size: 16px" class="active" data-filter="*">ทั้งหมด</li>
                            <li style="font-size: 16px" data-filter=".process">กำลังดำเนินการ</li>
                            <li style="font-size: 16px" data-filter=".success">สำเร็จ</li>
                            <li style="font-size: 16px" data-filter=".unsuccess">ไม่สำเร็จ</li>
                        </ul>
                    </div>

                    <div class="filters-content">
                        <div class="row grid">

                            @foreach ($orders as $item)
                            <div class="single-portfolio col-sm-12 all {{ $item->sts_class }}">
                                <div class="single-portfolio col-sm-12 ">
                                    <div class="relative">
                                        <div class="col-md-12">
                                            <div class="row mt-2"
                                                style="background-color: #60ebfd30;height: 100px;border-radius: 10px">
                                                <div class="col-md-10" id="tttt"
                                                    style="word-wrap:break-word;align-self: center; cursor: pointer;"
                                                    @click="goto('/order/' + {!! json_encode($item->order_id) !!})">
                                                    <div>
                                                        เลขที่คำสั่งซื้อ: {{ $item->order_no }}
                                                    </div>
                                                    <div>
                                                        วันที่ทำรายการ:
                                                        {{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}
                                                    </div>
                                                    <div>
                                                        วันที่ทำการติดตั้ง:
                                                        {{ date('d-m-Y H:i:s', strtotime($item->send_datetime)) }}
                                                    </div>

                                                </div>
                                                <div class="col-md-2 d-flex align-items-center"
                                                    style="justify-content: space-around;">
                                                    <div class="st-label st-process">
                                                        {{ $item->order_status_name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

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
<script src="/js/customer/status/app.js"></script>
@endsection