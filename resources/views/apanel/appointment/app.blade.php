@extends('apanel.layouts.app')

@section('title', 'การนัดหมาย')

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
                        ข้อมูลการนัดหมาย
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th style="width: 18%">ชื่อ</th>
                            <th style="width: 18%">สกุล</th>
                            <th style="width: 15%">เบอร์โทร</th>
                            <th style="width: 15%">วันที่นัดหมาย</th>
                            <th style="width: 15%">ประเภทการนัด</th>
                            <th style="width: 15%">สถานะ</th>
                            <th style="width: 15%">ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $item)
                        <tr>
                            <td>{{$item->first_name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td align="center">{{$item->tel}}</td>
                            <td align="center">{{date('d-m-Y H:i:s', strtotime($item->appointment_datetime))}}</td>
                            <td align="center">
                                @if ($item->appointment_type==1)
                                วัดขนาดสินค้า
                                @else
                                ติดตั้งสินค้า
                                @endif
                            </td>
                            <td align="center">{{$item->status}}</td>
                            <td align="center">
                                <a href="{{route('viewApanelAppointmentDetail', ['id' => $item->id, 'type' => $item->appointment_type])}}"
                                    class="btn btn-success  btn-circle btn-sm">
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