@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')

<div class="container">
    @foreach ($products as $key_cate => $item_cate)
    @if(count($item_cate))
    <div>
        {{ $key_cate }}
    </div>


    <div class="row" style="margin-top: 10px;margin-bottom: 10px;padding: 5px">
        @foreach ($item_cate as $key => $pd)
        <div class="single-recent-blog col-lg-4 col-md-4">
            <div class="thumb">
                <img class="f-img img-fluid mx-auto" src="{{($pd->img) ? $pd->img : '/img/defualt_product.jpg'}}">
            </div>
            <div style="color: #8490ff;font-size: 20px;margin-top: 15px">
                {{ $pd->name }} @if($pd->size) ({{ $pd->size }}) @endif
            </div>
            <p>
                {{ $pd->detail }}
            </p>

            <div class="col-md-12 col-sm-12" style="margin-top: 10px">
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