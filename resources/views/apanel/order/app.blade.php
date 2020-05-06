@extends('apanel.layouts.app')

@section('title', 'จัดการข้อมูลสินค้า')

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
                        ออร์เดอร์ทั้งหมด
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
                    <th style="width: 22%">ชื่อ - สกุล</th>
                    <th style="width: 18%">วันที่ติดตั้ง</th>
                    <th style="width: 15%">ราคา</th>
                    <th style="width: 15%">สถานะ</th>
                    <th style="width: 10%">รายละเอียด</th>          
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">xxxxxxx</td>
                        <td>xxxxxxx</td>
                        <td align="center">xxxxxxx</td>
                        <td align="center">xxxxx</td>
                        <td align="center">xxxxxxx</td>
                        <td align="center">
                            <div  class="btn btn-success btn-circle btn-sm">
                                <i class="fas fa-search"></i>
                            </div>
                        </td>
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