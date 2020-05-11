@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ใบเสนอราคา')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">

        <div class="section-top-border">
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
                            <th style="width: 7%">ลบ</th>
                        </tr>
                    </thead>
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