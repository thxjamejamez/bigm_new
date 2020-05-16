@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ที่อยู่การติดตั้ง')

@section('header-css')
@endsection

@section('content')

<div id="app" class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            @foreach ($appointment as $item)
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <div class="row">
                                <div class="col-lg-3">
                                    วันที่นัดหมาย : {{date('d-m-Y H:i:s', strtotime($item->appointment_datetime))}}
                                </div>

                                <div class="col-lg-6">
                                    สถานที่ : {{$item->address}}
                                    ต.{{$item->district_name}} อ.{{$item->amphure_name}}
                                    จ.{{$item->province_name}}
                                </div>

                                <div class="col-lg-3">
                                    ประเภทการนัดหมาย :
                                    {{($item->appointment_type == 1) ? 'นัดหมายวัดขนาด' : 'นัดหมายติดตั้งสินค้า'}}
                                </div>


                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('footer-js')

@endsection