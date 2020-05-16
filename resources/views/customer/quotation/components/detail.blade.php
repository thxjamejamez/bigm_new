@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'รายละเอียดคำสั่งซื้อ')

@section('header-css')
<link rel="stylesheet" href="/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">

<style>
    .text-head {
        color: black;
        font-weight: 600;
        font-size: 17px;
    }

    img {
        height: 150px;
        width: 150px;
    }
</style>
@endsection

@section('content')
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div>

                @if ($quotation->quotation_status == 3 && isset($appointment->appointment_change_datetime))
                <div class="alert alert-warning" role="alert">
                    <div class="row justify-content-between">
                        <div class="col-md-10 justify-content-between">
                            มีการขอเปลี่ยนวันที่การนัดหมายวัดขนาด จากวันที่
                            {{ date('d-m-Y H:i', strtotime($appointment->appointment_datetime)) }} เป็นวันที่
                            {{ date('d-m-Y H:i', strtotime($appointment->appointment_change_datetime)) }} หากปฏิเสธ
                            คำขอเสนอราคานี้จะถูกยกเลิก
                        </div>
                        <div class="col-md-2 float-right">
                            <a class="btn btn-success" href="{{route('changeDateAppt', ['id' => $quotation->id])}}">
                                ตกลง
                            </a>

                            <a class="btn btn-danger" href="{{route('cancelQuotation', ['id' => $quotation->id])}}">
                                ปฏิเสธ
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                @if ($quotation->quotation_status == 7)
                <div class="alert alert-danger" role="alert">
                    <div class="row justify-content-between">
                        <div class="col-md-12 justify-content-between">
                            ใบเสนอราคานี้ถูกยกเลิกเรียบร้อยแล้ว
                        </div>
                    </div>
                </div>
                @elseif($quotation->quotation_status == 6)
                <div class="alert alert-success" role="alert">
                    <div class="row justify-content-between">
                        <div class="col-md-12 justify-content-between">
                            ใบเสนอราคานี้ถูกสั่งซื้อเรียบร้อยแล้ว
                        </div>
                    </div>
                </div>
                @endif

                <div class="card card-outline-secondary">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">
                            รายละเอียดใบเสนอราคา</p>
                        <hr>
                        <div style="font-size: 16px">
                            <span style="color: black">เลขที่ใบเสนอราคา : </span>
                            <span>{{sprintf("Q%05d", $quotation->id)}}</span>
                        </div>
                        <div style="font-size: 16px;margin-top: 10px">
                            <span style="color: black">ที่อยู่การติดตั้ง : </span> <span>{{$quotation->address}}
                                ต.{{$quotation->district_name}} อ.{{$quotation->amphure_name}}
                                จ.{{$quotation->province_name}}</span>
                        </div>
                        <div style="font-size: 16px;margin-top: 10px">
                            <span style="color: black">สถานะใบเสนอราคา : </span> <span>{{$quotation->status}}</span>
                        </div>
                    </div>
                </div>

                @if($appointment)
                <div class="card card-outline-secondary" style="margin-top: 20px">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">
                            รายละเอียดการนัดหมาย</p>
                        <hr>
                        <div style="font-size: 16px">
                            <span style="color: black">วันเวลาที่นัดหมาย : </span>
                            <span>{{date('d-m-Y H:i', strtotime($appointment->appointment_datetime))}}</span>
                        </div>
                        <div style="font-size: 16px;margin-top: 10px">
                            <span style="color: black">สถานที่นัดหมาย : </span> <span>{{$appointment->address}}
                                ต.{{$appointment->district_name}} อ.{{$appointment->amphure_name}}
                                จ.{{$appointment->province_name}}</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="card card-outline-secondary" style="margin-top: 20px">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">รายละเอียดสินค้า
                        </p>
                        <hr>

                        @foreach ($quotation_pd as $quotation_item)
                        <div class="col-lg-12">
                            <blockquote class="generic-blockquote"
                                style="background-color: rgb(231, 243, 245) !important;border-radius: 5px">

                                <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center">
                                        <img
                                            src="{{($quotation_item->img_path) ? $quotation_item->img_path : '/img/defualt_product.jpg'}}">
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
                                                    ราคา
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 text-center">
                                                @foreach ($quotation_item->details as $details_item)
                                                <p>{{$details_item->size}}</p>
                                                @endforeach
                                            </div>

                                            <div class="col-md-3 text-center">
                                                @foreach ($quotation_item->details as $details_item)
                                                <p>{{$details_item->qty}}</p>
                                                @endforeach
                                            </div>

                                            <div class="col-md-3 text-center">
                                                @foreach ($quotation_item->details as $details_item)
                                                <p>{{$details_item->price_per_unit}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </blockquote>
                        </div>
                        @endforeach


                    </div>
                </div>

                @if($quotation->quotation_status == 5)
                <form action="{{route('makeOrder', ['quotation_id' => $quotation->id])}}" method="POST">
                    @csrf
                    <div class="col-lg-12 form-row justify-content-center" style="margin-top: 20px">
                        <div class="form-group col-md-5">
                            <label>วันเวลาที่นัดติดตั้ง</label>
                            <input name="install_dt" type="text" class="form-control" value="" required="required">
                        </div>
                    </div>
                    <div style="text-align: right; margin-top: 20px">
                        <div>
                            <a class="btn btn-danger" href="{{route('cancelQuotation', ['id' => $quotation->id])}}">
                                ปฏิเสธ
                            </a>
                            <button type="submit" class="btn btn-success">
                                ตกลงและสั่งซื้อ
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>

    </div>
</div>
</div>
</div>

@endsection

@section('footer-js')
<script src="/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

<script>
    $("input[name='install_dt']").datetimepicker({
        locale: moment().local("th"),
        format: "dd-mm-yyyy hh:i",
        autoclose: true,
        startDate: moment().add(3, "days").toDate(),
    });
</script>
@endsection