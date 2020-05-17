@extends('apanel.layouts.app')

@section('title', 'จัดการข้อมูลวัตถุดิบ')

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
                        จัดการข้อมูลวัตถุดิบ
                    </h6>
                </div>
                <div style="margin-left: auto;">
                    <div>
                        <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                            เพิ่มข้อมูลวัตถุดิบ
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
                            <th style="width: 25%">ชื่อวัตถุดิบ</th>
                            <th style="width: 35%">รูปสินค้า</th>
                            {{-- <th style="width: 15%">สถานะ</th> --}}
                            <th style="width: 7%">เเก้ไข</th>
                            <th style="width: 7%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($listMaterial as $key => $mt)
                        <tr>
                            <td align="center">{{ $mt->id }}</td>
                            <td>{{ $mt->name }}</td>
                            <td align="center"> <img style="width: 150px;height: 150px;" src="{{($mt->img_path) ? $mt->img_path : '/img/defualt_product.jpg'}}"></td>
                            {{-- <td>    
                                @if ($mt->active==1)
                                    <div>ยังดำเนินการ</div>    
                                @else
                                    <div>หยุดดำเนินการ</div>            
                                @endif
                            </td> --}}
                            <td align="center">
                                <div class="btn btn-warning btn-circle btn-sm">
                                    <a href="/apanel/material/{{$mt->id}}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <td align="center">
                                <a href="{{route('removeMaterial', ['id'=>$mt->id])}}"
                                    onclick="return confirm('Are you sure?')">
                                    <div class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </div>
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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">เพิ่มข้อมูลสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('storeMaterial')}}" method="POST" enctype="multipart/form-data">
                    <div>
                        @csrf
                        <span>ชื่อวัตถุดิบ</span>
                        <input type="text" name="nameMaterial" class="form-control" required>
                    </div>
                    {{-- <div class="mt-2">
                <span>ราคา (บาท)</span>
                <input type="text" name="" class="form-control" required>
            </div>
            <div class="mt-2">
                <span>ขนาด (เซนติเมตร)</span>
                <input type="text" name="" class="form-control" required>
            </div> --}}
                    <div class="mt-2">
                        <span>ภาพวัตถุดิบ</span>
                        <input type="file" name="img_material" class="form-control" required>
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