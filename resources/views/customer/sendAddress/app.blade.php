@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')

<div class="container" >
    <div class="item d-flex flex-row" style="margin: 10px;background-color: #f9f9ff;padding-top: 20px;padding-bottom: 20px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div  class="col-md-10" style="word-wrap:break-word;">
                            xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                        </div>
                        <div class="col-md-2 d-flex align-items-center" style="justify-content: space-around;">
                            <div style="background-color: #00bfa5;color: white;padding: 5px;border-radius: 5px">
                                ค่าเริ่มต้น
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-6 genric-btn success  circle arrow">
                            <span class="lnr lnr-pencil" style="font-size: 16px"></span>
                        </div>
                       
                        <div class="col-md-6 genric-btn danger circle" >
                            <span class="lnr lnr-trash"  style="font-size: 16px"></span>
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
