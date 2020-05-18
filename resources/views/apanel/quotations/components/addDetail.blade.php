@extends('apanel.layouts.app')

@section('title', 'การนัดหมาย')

@section('header-css')

@endsection

@section('content')
<div id="app" class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;">
                <div style="margin-top: 10px;">
                    <h6 class="m-0 font-weight-bold text-primary">
                        เพิ่มข้อมูลรายละเอียดการวัดขนาด
                    </h6>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="{{route('storeQuotationProductDetail', ['id' => $q_detail->id])}}" method="POST">
                @csrf
                <input type="hidden" name="appointment_id" value="{{$appt_id}}">
                <div class="card mb-3" v-for="(pd, index_pd) in controls.product">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center">
                                <img :src="pd.img_path">
                                <input type="hidden" :name="'product['+index_pd+']'"
                                    v-bind:value="pd.product_format_id">
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
                                    </div>

                                </div>

                                <div v-for="(detail, index_detail) in pd.details" class="row mb-3">

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input :name="'size['+index_pd+']['+index_detail+']'" type="text"
                                                class="form-control" @keypress="validKeyNumbers" v-model="detail.size"
                                                required="required">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input :name="'qty['+index_pd+']['+index_detail+']'" type="number"
                                                class="form-control" min="0" max="20" v-model="detail.qty"
                                                required="required">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div v-if="pd.details.length > 1" class="col-md-3">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    @click="removesize(pd, index_detail)">ลบ</button>
                                            </div>
                                            <div v-if="detail.size && detail.qty != 0" class="col-md-3">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    @click="addsize(pd)">เพิ่ม</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-success">
                            บันทึกข้อมูล
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
    const data = "{{base64_encode(json_encode($q_pd))}}"
</script>
<script src="/js/apanel/quotation/addDetail.js"></script>
@endsection