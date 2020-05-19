@extends('apanel.layouts.app')

@section('title', 'จัดการข้อมูลคำสั่งซื้อ')

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
                        รายการคำสั่งซืื้อ
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th style="width: 40%">หมายเลขคำสั่งซื้อ</th>
                            <th style="width: 50%">สถานะคำสั่งซื้อ</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                        <tr>
                            <td align="center">{{sprintf("ORD%05d", $item->id)}}</td>
                            <td align="center">{{$item->status}}</td>
                            <td align="center">
                                <a href="{{ route('viewOrderDetailApanel', ['order_id' => $item->id]) }}">
                                    <div class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </a>z
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