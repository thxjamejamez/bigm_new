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
                        ข้อมูลผู้ใช้งาน
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
                    <th style="width: 20%">ชื่อ</th>
                    <th style="width: 19%">สกุล</th>
                    <th style="width: 15%">ประเภทผู้ใช้งาน</th>
                    <th style="width: 15%">เบอร์โทร</th>
                    <th style="width: 12%">ดูรายละเอียด</th>
                    <th style="width: 7%">เเก้ไข</th>
                    <th style="width: 7%">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">1</td>
                        <td>สิทธิกร</td>
                        <td>มะกูลต๊ะ</td>
                        <td align="center">ลูกค้า</td>
                        <td align="center">0856238872</td>
                        <td align="center">
                            <div class="btn btn-success  btn-circle btn-sm">
                                <i class="fas fa-search"></i>
                            </div>
                        </td>
                        <td align="center">
                            <div class="btn btn-warning btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </div>
                        </td>
                        <td align="center">
                            <div  class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">เพิ่มข้อมูลสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form>
            <div>
                <span>ชื่อสินค้า</span>
                <input type="text" name="" class="form-control" required>
            </div>
            <div class="mt-2">
                <span>ราคา (บาท)</span>
                <input type="text" name="" class="form-control" required>
            </div>
            <div class="mt-2">
                <span>ขนาด (เซนติเมตร)</span>
                <input type="text" name="" class="form-control" required>
            </div>
            <div class="mt-2">
                <span>ภาพสินค้า</span>
                <input type="file" name="" class="form-control" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="Submit" class="btn btn-primary">บันทึก</button>
            </div>
        </form>
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