@extends('apanel.layouts.app')

@section('title', 'จัดการข้อมูลผู้ใช้งาน')

@section('header-css')

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
                                <a href="/apanel/user/{{$item->id}}" class="btn btn-success  btn-circle btn-sm">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                            <td align="center">
                                <div class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </div>
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

<script>
    $('#dataTable').DataTable()
</script>
@endsection