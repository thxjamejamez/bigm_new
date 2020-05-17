@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')
<style>
    .text-head {
        color: black;
        font-weight: 600;
        font-size: 17px;
    }

    .card-product .img-wrap {
        border-radius: 3px 3px 0 0;
        overflow: hidden;
        position: relative;
        height: 220px;
        text-align: center;
    }

    .card-product .img-wrap img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
    }

    .card-product .info-wrap {
        overflow: hidden;
        padding: 15px;
        border-top: 1px solid #eee;
    }

    .card-product .bottom-wrap {
        padding: 15px;
        border-top: 1px solid #eee;
    }

    .label-rating {
        margin-right: 10px;
        color: #333;
        display: inline-block;
        vertical-align: middle;
    }

    .card-product .price-old {
        color: #999;
    }
</style>
@endsection

@section('content')

<div class="container">

    <div class="col-md-12 text-center mt-4">
        @auth
        <div class="genric-btn primary-border circle mb-30" data-toggle="modal" data-target="#staticBackdrop">
            + อัปโหลดข้อมูลสินค้า
        </div>
        @endauth

    </div>


    @foreach ($products as $key_cate => $item_cate)
    @if(count($item_cate))
    <div class="card mb-3">
        <div class="card-header">
            <span class="text-head">{{ $key_cate }}</span>
        </div>
        <div class="card-body col-lg-12">
            <div class="row">
                @foreach ($item_cate as $key => $pd)
                <div class="col-md-4 mb-4">
                    <figure class="card card-product">
                        <div class="thumb img-wrap">
                            <img src="{{($pd->img_path) ? $pd->img_path : '/img/defualt_product.jpg'}}">
                        </div>
                        <figcaption class="info-wrap">
                            <span style="color: #8490ff;font-size: 17px;">{{ $pd->name }}</span>
                        </figcaption>
                    </figure>
                </div>

                @endforeach
            </div>
        </div>
    </div>

    @endif
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">เพิ่มข้อมูลสินค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('storeProductCustomer')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <span>ชื่อสินค้า</span>
                            <input type="text" name="product_name" class="form-control" required>
                        </div>

                        <div class="mt-2">
                            <span>ภาพสินค้า</span>
                            <input type="file" name="product_img" class="form-control" value="" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-js')

@endsection