@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ใบเสนอราคา')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">

            <button type="button" class="btn btn-primary pull-right mb-10" data-toggle="modal"
                data-target="#add-quotation">
                ขอใบเสนอราคา
            </button>

            <div class="table-responsive mb-10">
                <table class="table table-bordered" id="quotation-table" width="100%" cellspacing="0">
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
                            <td style="width: 10%"><a href="{{route('viewDetailQuotation', ['id'=> $item->id])}}"
                                    class="btn btn-primary btn-sm">ดูรายละเอียด</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="add-quotation" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">

                            <section class="price-area section-gap" style="padding: 0;">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 single-price" onclick="gotourl(1)">
                                        <div class="top-part">
                                            <h1 class="package-no"><span class="lnr lnr-strikethrough"></span></h1>
                                            <hr>
                                            <label style="font-size: x-large;">วัดขนาดเอง</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 single-price" onclick="gotourl(2)">
                                        <div class="top-part">
                                            <h1 class="package-no"><span class="lnr lnr-location"></span></h1>
                                            <hr>
                                            <label style="font-size: x-large;">ให้ช่างวัดขนาด</label>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- End modal --}}

    </div>
</div>


@endsection

@section('footer-js')
<script src="/plugins/apanel/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/apanel/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/js/customer/quotation/app.js"></script>
@endsection