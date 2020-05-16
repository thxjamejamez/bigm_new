@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'รายละเอียดการสั่งซื้อ')

@section('header-css')
<style>
    div.order-group {
        padding: 10px;
        background-color: whitesmoke;
    }

    label.order-no {
        padding: 7px 0;
    }

    .text-head {
        color: black;
        font-weight: 600;
        /* font-size: 17px; */
    }

    .big-size {
        font-size: 17px;
    }

    .bold {
        font-weight: 600;

    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="section-top-border">
        <section class="faq-area pb-120">

            @if ($order->order_status == 2)
            <div class="alert alert-warning" role="alert">
                <div class="row justify-content-between">
                    <div class="col-md-10 justify-content-between">
                        มีการขอเปลี่ยนวันที่ติดตั้งสินค้า จากวันที่
                        {{ date('d-m-Y H:i', strtotime($order->send_datetime)) }} เป็นวันที่
                        {{ date('d-m-Y H:i', strtotime($order->send_change_datetime)) }} หากปฏิเสธ
                        รายการคำสั่งซื้อนี้จะถูกยกเลิก
                    </div>
                    <div class="col-md-2 float-right">
                        <a class="btn btn-success" href="{{route('changeDateOrder', ['id' => $order->id])}}">
                            ตกลง
                        </a>

                        <a class="btn btn-danger" href="{{route('cancelOrder', ['id' => $order->id])}}">
                            ปฏิเสธ
                        </a>
                    </div>
                </div>
            </div>
            @elseif ($order->order_status == 3)
            <div class="alert alert-warning" role="alert">
                <div class="row justify-content-between">
                    <div class="col-md-12 justify-content-between">
                        <div class="col-md-10 justify-content-between">
                            กรุณาชำระเงิน และแจ้งชำระเงิน
                        </div>
                        <div class="col-md-2 float-right">
                            <a class="btn btn-primary" href="{{route('payment', ['id' => $order->id])}}">
                                แจ้งชำระเงิน
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif (in_array($order->order_status, [5,6]))
            <div class="alert alert-warning" role="alert">
                <div class="row justify-content-between">
                    <div class="col-md-12 justify-content-between">
                        <div class="col-md-12 justify-content-between">
                            คำสั่งซื้อนี้อยู่ระหว่างการจัดทำและติดตั้ง
                        </div>
                    </div>
                </div>
            </div>

            @elseif($order->order_status == 7)
            <div class="alert alert-success" role="alert">
                <div class="row justify-content-between">
                    <div class="col-md-12 justify-content-between">
                        รายการคำสั่งซื้อนี้สำเร็จแล้ว
                    </div>
                </div>
            </div>
            @elseif($order->order_status == 8)
            <div class="alert alert-danger" role="alert">
                <div class="row justify-content-between">
                    <div class="col-md-12 justify-content-between">
                        รายการคำสั่งซื้อนี้ถูกยกเลิกเรียบร้อยแล้ว
                    </div>
                </div>
            </div>

            @elseif($order->order_status == 9)
            <div class="alert alert-warning" role="alert">
                <div class="row justify-content-between">
                    <div class="col-md-12 justify-content-between">
                        <div class="col-md-10 justify-content-between">
                            การชำระเงินก่อนหน้าไม่ถูกต้อง กรุณาแจ้งการชำระเงินอีกครั้ง
                        </div>
                        <div class="col-md-2 float-right">
                            <a class="btn btn-primary" href="{{route('payment', ['id' => $order->id])}}">
                                แจ้งชำระเงินอีกครั้ง
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            <div class="order-group">
                <div class="rows text-right">
                    <label class="order-no">
                        หมายเลขคำสั่งซื้อ: {{$order->order_no}} | {{$order->status}}
                    </label>
                </div>

                <div class="rows mb-3">
                    <div class="card">
                        <div class="card-header text-center">
                            ข้อมูลการติดตั้ง
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <span style="color: black">ที่อยู่การติดตั้ง: </span>
                                <span>{{$order->address}}
                                    ต.{{$order->district_name}} อ.{{$order->amphure_name}}
                                    จ.{{$order->province_name}}</span>
                            </p>
                            <p class="card-text">
                                <span style="color: black">วันที่ติดตั้ง: </span>
                                <span>{{date('d-m-Y H:i:s', strtotime($order->send_datetime))}}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rows mb-3">
                    <div class="card">
                        <div class="card-header text-center">
                            รายละเอียดสินค้า
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                @foreach ($product as $pd_item)
                                <div class="col-lg-12">
                                    <blockquote class="generic-blockquote"
                                        style="background-color: #f6f7f7 !important;border-radius: 5px">

                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center">
                                                <img style="height: 150px; width:150px"
                                                    src="{{($pd_item->img_path) ? $pd_item->img_path : '/img/defualt_product.jpg'}}">
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
                                                        @foreach ($pd_item->details as $details_item)
                                                        <p>{{$details_item->size}}</p>
                                                        @endforeach
                                                    </div>

                                                    <div class="col-md-3 text-center">
                                                        @foreach ($pd_item->details as $details_item)
                                                        <p>{{$details_item->qty}}</p>
                                                        @endforeach
                                                    </div>

                                                    <div class="col-md-3 text-center">
                                                        @foreach ($pd_item->details as $details_item)
                                                        <p>{{number_format($details_item->price_per_unit, 2)}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </blockquote>
                                </div>
                                @endforeach

                                <div class="col-lg-12">
                                    <blockquote class="generic-blockquote"
                                        style="background-color: #f6f7f7 !important;border-radius: 5px">

                                        <div class="row justify-content-center">
                                            <div class="col-md-12 text-right">
                                                <label class="big-size bold">ราคารวม: </label>
                                                <label class="big-size">{{number_format($order->amount, 2)}} บาท</label>
                                            </div>
                                        </div>

                                    </blockquote>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</div>

@endsection