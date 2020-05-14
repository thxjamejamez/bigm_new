@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')

<div class="container">

    <div class="col-md-12 text-center mt-4">
        <div class="genric-btn primary-border circle mb-30" data-toggle="modal" data-target="#staticBackdrop">
            + อัปโหลดข้อมูลสินค้า
        </div>
    </div>

    @foreach ($products as $key_cate => $item_cate)
    @if(count($item_cate))
    <div>
        {{ $key_cate }}
    </div>
    <div class="row" style="margin-top: 10px;margin-bottom: 10px;padding: 5px">
        @foreach ($item_cate as $key => $pd)
        <div class="single-recent-blog col-lg-4 col-md-4">
            <div class="thumb">
                <img class="f-img img-fluid mx-auto"
                    src="{{($pd->img_path) ? $pd->img_path : '/img/defualt_product.jpg'}}">
            </div>
            <div style="color: #8490ff;font-size: 20px;margin-top: 15px">
                {{ $pd->name }}
            </div>

            {{-- <div class="col-md-12 col-sm-12" style="margin-top: 10px">
                <div class="row">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center" style="padding: 0">
                        {{ number_format($pd->price, 2) }} บาท
        </div>

        @auth
        <form action="{{ route('updateCart') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $pd->id }}">
            <div class="col-md-6 col-sm-12" style="padding: 0px;text-align: right;">
                <button type="submit" class="btn btn-secondary">Add to cart</button>
            </div>
        </form>
        @endauth

    </div>
</div> --}}



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
            <form action="{{route('storeProductCustomer')}}" method="POST">
                    @csrf
                    <div>
                        <span>ชื่อสินค้า</span>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                    {{-- <div>
                        <span>รายละเอียดสินค้า</span>
                        <textarea style="height: 100px" class="form-control"></textarea>
                    </div> --}}
                    {{-- <div class="mt-2">
                        <span>ราคา (บาท)</span>
                        <input type="text" name="" class="form-control" required>
                    </div> --}}
                    {{-- <div class="mt-2">
                        <span>ขนาด (เซนติเมตร)</span>
                        <input type="text" name="" class="form-control" required>
                    </div> --}}
                    <div class="mt-2">
                        <span>ภาพสินค้า</span>
                        <input type="file" name="product_img" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="Submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endforeach

</div>


@endif
@endforeach
</div>
@endsection

@section('footer-js')

@endsection