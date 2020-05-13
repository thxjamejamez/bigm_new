@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ขอใบเสนอราคา')

@section('header-css')
<style>
    img {
        max-height: 255px;
        max-width: 255px;
    }
</style>
@endsection

@section('content')
<div id="app" class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-12">
                    <blockquote class="generic-blockquote">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center">
                                <img src="/img/defualt_product.jpg">
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                </div>

                            </div>

                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div> @endsection @section('footer-js') <script src="/js/customer/quotation/addtype1.js"></script>
@endsection