@extends('apanel.layouts.app')

@section('title', 'ใบเสนอราคา')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;">
                <div style="margin-top: 10px;">
                    <h6 class="m-0 font-weight-bold text-primary">
                        รายการใบสั่งซื้อสินค้า
                    </h6>
                </div>
                {{-- <div style="margin-left: auto;">
                    <div>
                        <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                            เพิ่มข้อมูลสินค้า
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th style="width: 5%">ลำดับ</th>
                            <th style="width: 18%">ชื่อ</th>
                            <th style="width: 18%">สกุล</th>
                            <th style="width: 15%">เบอร์โทร</th>
                            <th style="width: 15%">วันที่นัดหมาย</th>
                            <th style="width: 15%">ประเภทการนัด</th>
                            <th style="width: 15%">ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $item)
                        <tr>
                            <td align="center">1</td>
                            <td>{{$item->first_name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td align="center">{{$item->last_name}}</td>
                            <td align="center">{{$item->tel}}</td>
                            <td align="center">
                                @if ($item->appointment_type==1)
                                    นัดวัด
                                @else
                                    นัดติดตั้ง
                                @endif
                            </td>
                            <td align="center">
                                <a href="/apanel/quotations/2" class="btn btn-success  btn-circle btn-sm">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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