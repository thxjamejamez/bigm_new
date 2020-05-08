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
</style>
@endsection

@section('content')
<div class="container">
    <div class="section-top-border">
        <section class="faq-area pb-120">
            <div class="order-group">
                <div class="rows text-right">
                    <label class="order-no">
                        เลขที่คำสั่งซื้อ: {{$order->order_no}} | {{$order->order_status_name}}
                    </label>
                </div>

                <div class="rows">
                    <div class="card">
                        <div class="card-header text-center">
                            ข้อมูลการติดตั้ง
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="row justify-content-center">
                <div class="col-lg-8">

                </div>
            </div> --}}

        </section>
    </div>
</div>

@endsection