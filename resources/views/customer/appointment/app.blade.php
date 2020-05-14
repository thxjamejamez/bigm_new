@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ที่อยู่การติดตั้ง')

@section('header-css')
@endsection

@section('content')

<div id="app" class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            {{-- @foreach ($list_address as $item) --}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <div class="row">
                                <div class="col-lg-3">
                                    วันที่นัดหมาย : 25/2/2563
                                </div>

                                <div class="col-lg-6">
                                    สถานที่ : ่ดก่ดาดหาด่กหวาดกหด่หกวาดหกวดา่กหาด่วดกหดกหดกหดกดกหดกหดกหดดหกาดหกา่ดาสกหด
                                </div>

                                <div class="col-lg-3">
                                    ประเภทการนัดหมาย : วัดขนาด
                                </div>
            

                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</div>
@endsection

@section('footer-js')

@endsection