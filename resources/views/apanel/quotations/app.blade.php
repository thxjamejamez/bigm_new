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
                        รายการคำขอใบเสนอราคา
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th style="width: 40%">เลขที่ใบเสนอราคา</th>
                            <th style="width: 50%">สถานะใบเสนอราคา</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotation as $item)
                        <tr align="center">
                            <td style="width: 40%">{{sprintf("Q%05d", $item->id)}}</td>
                            <td style="width: 50%">{{$item->status}}</td>
                            <td style="width: 10%"><a href="{{route('viewDetailQuotationApanel', ['id'=> $item->id])}}"
                                    class="btn btn-primary btn-sm">ดูรายละเอียด</a></td>

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