@extends('apanel.layouts.app')

@section('title', 'ข้อมูลการเสนอราคา')

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
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th style="width: 5%">ลำดับ</th>
                            <th style="width: 20%">ชื่อ</th>
                            <th style="width: 19%">สกุล</th>
                            <th style="width: 15%">เบอร์โทร</th>
                            <th style="width: 15%">วันที่นัดหมาย</th>
                            <th style="width: 12%">ดูรายละเอียด</th>
                            {{-- <th style="width: 7%">ลบ</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center">1</td>
                            <td>สิทธิกร</td>
                            <td>มะกูลต๊ะ</td>
                            <td align="center">0856238872</td>
                            <td align="center">13/2/2555</td>
                            <td align="center">
                                <a href="/apanel/quotations/2" class="btn btn-success  btn-circle btn-sm">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                            {{-- <td align="center">
                                <div class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </td> --}}
                        </tr>
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