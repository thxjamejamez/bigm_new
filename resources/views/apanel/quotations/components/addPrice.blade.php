@extends('apanel.layouts.app')

@section('title', 'เสนอราคาสินค้า')

@section('header-css')

@endsection

@section('content')
<div id="app" class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;">
                <div style="margin-top: 10px;">
                    <h6 class="m-0 font-weight-bold text-primary">
                        เสนอราคาสินค้า
                    </h6>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="{{route('storeQuotationProductPrice', ['id' => $q_detail->id])}}" method="POST">
                @csrf

                @foreach ($q_pd as $keypd => $pd)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center">
                                <img src="{{($pd->img_path) ? $pd->img_path : '\img\defualt_product.jpg'}}">
                                <input type="hidden" :name="'product[{{$keypd}}]'" value="{{$pd->product_format_id}}">
                            </div>

                            <div class="col-md-8 mb-3">
                                <div class="head-pddetail row mb-3">
                                    <div class="col-md-6 text-center">
                                        <span class="text-head">
                                            ขนาดสินค้า
                                        </span>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <span class="text-head">
                                            จำนวน
                                        </span>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <span class="text-head">
                                            ราคาต่อหน่วย
                                        </span>
                                    </div>

                                </div>

                                @foreach ($pd->details as $keydt => $detail)
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{$detail->size}}"
                                                required="required" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control" min="0" max="20"
                                                value="{{$detail->qty}}" required="required" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="price[{{$detail->id}}]"
                                                value="" required>
                                        </div>
                                    </div>

                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-danger"
                            href="{{route('cancelQuotationApanel', ['quotation_id' => $q_detail->id])}}">ปฏิเสธการเสนอราคา</a>
                        <button class="btn btn-success">
                            เพิ่มข้อมูลใบเสนอราคา
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section('footer-js')
<script>
    // const data = "{{base64_encode(json_encode($q_pd))}}"
</script>
{{-- <script src="/js/apanel/quotation/addDetail.js"></script> --}}
@endsection