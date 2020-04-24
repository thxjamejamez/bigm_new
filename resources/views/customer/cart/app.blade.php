@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')

<div class="container" >
    <div class="section-top-border">
        <div>ตะกร้าสินค้า</div>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">
                    <div class="serial">#</div>
                    <div class="country">รายการสินค้า</div>
                    <div class="visit">ราคาต่อชิ้น</div>
                    <div class="percentage">จำนวน</div>
                    <div class="percentage">ราคารวม</div>
                    <div class="percentage">xxx</div>
                </div>
                <div class="table-row">
                    <div class="serial">0กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก1</div>
                    <div class="country"> <img src="img/elements/f1.jpg" alt="flag">Canada</div>
                    <div class="visit">645032</div>
                    <div class="percentage">
                        <div class="progress">
                            <div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
