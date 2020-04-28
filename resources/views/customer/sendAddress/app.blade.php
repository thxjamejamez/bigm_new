@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ที่อยู่การติดตั้ง')

@section('header-css')
<style>
    .label-green {
        padding: 5px;
        color: white;
        background-color: #4CAF50;
        border-radius: 15%;
        height: fit-content;
        width: fit-content;
    }
</style>
@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">

            @if (isset($permission_add) && $permission_add)
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    88 ม.4 ต.หนองหนาม อ.เมือง จ.ลำพูน
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <span class="label-green align-self-center">ค่าเริ่มต้น</span>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center">
                                    <div>
                                        <a href="#" class="genric-btn primary circle">
                                            <span class="lnr lnr-pencil" style="font-size: 16px"></span>
                                        </a>
                                        <a href="#" class="genric-btn danger circle">
                                            <span class="lnr lnr-trash" style="font-size: 16px"></span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">ไม่สามารถทำการเพิ่มข้อมูลที่อยู่ในการติดตั้งได้</h4>
                <p style="font-size: 100px; text-align: center; padding: 10px;"><span
                        class="lnr lnr-cross-circle"></span></p>
                <hr>
                <p class="mb-0">กรุณาแก้ไขข้อมูลส่วนตัวให้ถูกต้อง</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer-js')

@endsection