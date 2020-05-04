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
                        จัดการข้อมูลสินค้า
                    </h6>
                </div>
                <div style="margin-left: auto;">
                    <div>
                        <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                            เพิ่มข้อมูลสินค้า
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                    <th style="width: 5%">ลำดับ</th>
                    <th style="width: 25%">ชื่อสินค้า</th>
                    <th style="width: 26%">รูปสินค้า</th>
                    <th style="width: 15%">ราคา (บาท)</th>
                    <th style="width: 15%">ขนาด (เซนติเมตร)</th>
                    <th style="width: 7%">เเก้ไข</th>
                    <th style="width: 7%">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ประตูหน้าต่าง</td>
                        <td><img style="width: 250px;height: 150px;" src="https://www.prachachat.net/wp-content/uploads/2019/09/ctn01160962p1-728x520.jpg"></td>
                        <td>30.00</td>
                        <td>120*21</td>
                        <td>
                            <div class="btn btn-warning btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </div>
                        </td>
                        <td>
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