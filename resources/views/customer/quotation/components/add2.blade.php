@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ขอใบเสนอราคา')

@section('header-css')
<link rel="stylesheet" href="/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<style>
    img {
        max-height: 255px;
        max-width: 255px;
    }

    img.small {
        max-height: 75px;
        max-width: 75px;
    }

    .text-head {
        color: black;
        font-weight: 600;
        font-size: 17px;
    }

    .pointer {
        cursor: pointer;
    }

    li:hover {
        background-color: #a9cdda4a !important;
    }
</style>
@endsection

@section('content')
<div id="app" class="whole-wrap">
    <div class="container">

        <div class="section-top-border">
            <form action="{{route('storeQuotationType2')}}" method="POST">
                @csrf
                @if(!$can_order)
                <div class="alert alert-danger" role="alert">
                    กรุณาเพิ่มข้อมูลที่อยู่การติดตั้ง
                </div>
                @else
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary pull-right mb-10" @click="toggleModal()">
                            เพิ่มรูปแบบ
                        </button>
                    </div>
                </div>
                @endif

                <div class="row grid mb-3">
                    <div class="single-portfolio col-sm-4" v-for="(pd, index_pd) in controls.product">
                        <input type="hidden" name="product[]" :value="pd.pd_f_id">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" :src="pd.pd_f_img" alt="">
                            </div>
                        </div>
                        <div class="p-inner text-center">
                            <div class="text-head">@{{pd.pd_f_name}}</div>
                            <div class="cat">@{{pd.pd_cate_name}}</div>
                        </div>
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-md-5">
                        <label>ที่อยู่การติดตั้ง</label>
                        <select class="form-control" name="cust_send_address">
                            <option value="0">--เลือกที่อยู่การติดตั้ง--</option>
                            @foreach ($send_address as $item)
                            <option value="{{$item->id}}" @if($item->defualt) selected @endif>{{$item->address}}
                                ต.{{$item->district_name}} อ.{{$item->amphure_name}}
                                จ.{{$item->province_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label>วันที่นัดวัดขนาด</label>
                        <input name="appointment_dt" type="text" class="form-control" required="required">
                    </div>

                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="genric-btn primary-border circle mb-30"
                        v-bind:class="{disable: !controls.submit}" style="width: 300px;"
                        :disabled="!controls.submit">ขอใบเสนอราคา</button>
                </div>
            </form>
        </div>
    </div>

    {{-- start modal --}}
    <div class="modal fade" id="add-productformat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <span class="modal-title text-head">เพิ่มรูปแบบสินค้าเพื่อขอใบเสนอราคา</span>
                    <button type="button" class="close" @click="toggleModal()">
                        <span aria-hidden="true">&times;</span>
                </div>

                <div class="modal-body">
                    <ul class="list-group">
                        <li v-for="item in controls.modal" class="list-group-item pointer"
                            @click="addProductFormat(item)">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="small rounded mx-auto d-block" :src="item.img_path">
                                </div>
                                <div class="col-md-6 d-flex align-self-center">
                                    <span>@{{item.pd_f_name}}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="toggleModal()">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

</div>
@endsection

@section('footer-js')
<script src="/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script>
    const data = "{{base64_encode(json_encode($pd_f))}}"
</script>
<script src="/js/customer/quotation/addtype2.js"></script>

@endsection