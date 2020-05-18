@extends('apanel.layouts.app')

@section('title', 'รายงานการขาย')

@section('header-css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="/css/apanel/report/summary/app.css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;">
                <div style="margin-top: 10px;">
                    <h6 class="m-0 font-weight-bold text-primary">
                        รายงานการขาย
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="Salesummary-report" style="width:100%;">
                <h2 class="thsarabunnew hidden-xs" style="text-align: center;color: #1f2d3d">
                    <b>สรุปยอดขาย</b>
                </h2>
                <form class="form-inline no-print">
                    <div class="form-group pull-right">
                        <b>ช่วงเวลา:&nbsp;</b>
                        <div class="form-group"
                            style="background: #fff; cursor: pointer; padding:10px; border: 1px solid #ccc;border-radius:3px;">
                            <div id="fil_DateRange">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span>@{{ form.start | formatDate }} - @{{ form.end | formatDate }}</span> &nbsp;<b
                                    class="caret pull-right" style="margin-top: 6px;"></b>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="report-detail form-group">
                    <data-table :key="0" :data="filterData" :columns="dt.column">
                    </data-table>
                </div>
                <div class="rows" less-type="SUM-Payment">
                    <h3 class="xs-h3 txt-up">Summary:</h3>
                    <div v-if="sumData" :class="{ 'md-tbody': true }" class="rows_sum">
                        <div class="pay_method">
                            <strong>รวมทั้งสิ้น</strong>
                        </div>
                        <div class="payment_amount">
                            <strong>@{{ sumData }}</strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer-js')
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="/plugins/accounting.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<legend x-data-table hidden>@include('apanel.reports.helper.x-data-table')</legend>
<script src="/js/apanel/report/summary/app.js"></script>
@endsection