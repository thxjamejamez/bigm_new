@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')

<div class="container">
    <div class="row" style="margin-top: 10px;margin-bottom: 10px;padding: 5px">	
        <div class="single-recent-blog col-lg-4 col-md-4">
            <div class="thumb">
                <img class="f-img img-fluid mx-auto" src="https://love.campus-star.com/app/uploads/2019/08/Doraemon.jpg" alt="">	
            </div>						
            <div style="color: #8490ff;font-size: 20px;margin-top: 15px">
                Break Through Self Doubt 
                And Fear (120*110)
            </div>
            <p>
                Dream interpretation has many forms; it can be done be done for the sake of fun, hobby or can be taken up as a serious career.
            </p>
            
            <div class="col-md-12 col-sm-12" style="margin-top: 10px">
                <div class="row">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center" style="padding: 0">
                        150 บาท
                    </div>

                    <div class="col-md-6 col-sm-12" style="padding: 0px;text-align: right;">
                        <button type="button" class="btn btn-secondary">Add to cart</button>
                    </div>
                </div>
            </div>

        </div>                                
    </div>
</div>
@endsection

@section('footer-js')

@endsection