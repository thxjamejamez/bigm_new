@extends('apanel.layouts.app')

@section('title', 'รายละเอียดการชำระเงิน')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    img {
        width: 300px;
        height: 350px;
    }
</style>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div style="display: flex;">
            <div style="margin-top: 10px;">
                <h6 class="m-0 font-weight-bold text-primary">
                    รายละเอียดการชำระเงิน
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <table style="width: 100%;">
                        <tr style="text-align: left;">
                            <td>
                                หมายเลขคำสั่งซื้อ
                            </td>
                            <td>
                                : {{sprintf("ORD%05d", $order_detail->id)}}
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                สถานะคำสั่งซื้อ
                            </td>
                            <td>
                                : {{$order_detail->status}}
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                ยอดที่ต้องชำระ
                            </td>
                            <td>
                                : {{number_format($order_detail->amount, 2)}} บาท
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                ชื่อลูกค้าที่แจ้งชำระ
                            </td>
                            <td>
                                : {{$order_detail->name_sender}}
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                โอนจากบัญชี
                            </td>
                            <td>
                                : {{$order_detail->bank_name}}
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                จำนวนเงินที่ชำระ
                            </td>
                            <td>
                                : {{number_format($order_detail->send_amount, 2)}} บาท
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                วันเวลาที่ชำระเงิน
                            </td>
                            <td>
                                : {{date('d-m-Y H:i:s', strtotime($order_detail->payment_datetime))}}
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                หมายเหตุ
                            </td>
                            <td>
                                : {{$order_detail->remark}}
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12" align="center">
                    <img src="{{$order_detail->img_slip}}">
                </div>
            </div>
        </div>
        <hr>
        @if (in_array($order_detail->order_status, [4, 9]))
        <div align="center">
            <table>
                <tr>
                    <td style="width: 140px;">
                        <a href="{{route('PaymentInvalid', ['id' => $order_detail->id])}}">
                            <button style="width: 100%;" class="btn btn-danger">
                                ไม่ถูกต้อง
                            </button>
                        </a>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td style="width: 140px">
                        <a href="{{route('PaymentSuccess', ['id' => $order_detail->id])}}">
                            <button style="width: 100%;" class="btn btn-success">
                                ถูกต้อง
                            </button>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        @endif


    </div>
</div>
@endsection

@section('footer-js')
<script src="/plugins/apanel/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/apanel/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $('#dataTable').DataTable()
</script>
@endsection