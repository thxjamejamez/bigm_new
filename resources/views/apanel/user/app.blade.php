@extends('apanel.layouts.app')

@section('title', 'จัดการข้อมูลผู้ใช้งาน')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;">
                <div style="margin-top: 10px;">
                    <h6 class="m-0 font-weight-bold text-primary">
                        ข้อมูลผู้ใช้งาน
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
                            <th style="width: 20%">ชื่อผู้ใช้</th>
                            <th style="width: 19%">อีเมล์</th>
                            <th style="width: 12%">ดูรายละเอียด</th>
                            <th style="width: 7%">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($userInfor as $key=> $item)
                        <tr>
                            <td align="center">{{$key+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td align="center">
                                <a href="/apanel/user/{{$item->id}}" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td align="center">
                                <button class="btn btn-danger btn-circle btn-sm" type="button"
                                    onclick="remove({{$item->id}})">
                                    <i class="fas fa-trash"></i>
                                </button>
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
    @if (session()->has('updated'))
        Swal.fire(
            'สำเร็จ',
            'แก้ไขข้อมูลผู้ใช้เรียบร้อยแล้ว',
            'success'
        )
    @elseif(session()->has('removed'))
        Swal.fire(
            'สำเร็จ',
            'ลบข้อมูลผู้ใช้เรียบร้อยแล้ว',
            'success'
        )
    @endif

    function remove(id) {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'คุณแน่ใจหรือ?',
        text: "คุณต้องการลบข้อมูลผู้ใช้นี้",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ไม่ใช่',
        reverseButtons: true
        }).then((result) => {
        if (result.value) {
            window.location = '/apanel/user/inactive/' + id
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
        }
        })
    }
    
    
    
</script>
@endsection