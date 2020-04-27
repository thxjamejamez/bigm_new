@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'เเจ้งชำระเงิน')

@section('header-css')

@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div >
                <!-- form card cc payment -->
                <div class="card card-outline-secondary">
                    <div class="card-body">
                        <p style="font-weight: bold;font-size: 18px;color: black" class="text-center">แจ้งการชำระเงิน</p>
                        <hr>
                        <form class="form" role="form" action="" method="post" id="registrationForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="cc_name">เลือกรายการจอง</label>
                                <select class="form-control" name="bk_id" required>
                                  <option value="0" disabled selected>กรุณาเลือก 1 รายการ</option>
                                 
                                  <option value=""></option> 
                              
                                </select>
                            </div>
                            <div class="form-group">
                                <label>เลือกธนาคารที่โอน</label>
                                <select class="form-control">
                                  <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-6">
                                  <label>ชื่อผู้โอน</label>
                                  <input type="text" class="form-control" autocomplete="off" name="bank_account" required="">
                                </div>
                                <div class="col-6">
                                  <label>จำนวนเงินที่โอน (บาท)</label>
                                  <div >
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">฿</span></div>
                                        <input type="text" class="form-control text-right" id="exampleInputAmount" placeholder="00" 
                                        name="amount">
                                        <!-- <div class="input-group-append"><span class="input-group-text">.00</span></div> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-6">
                                  <label>วันที่โอนเงิน</label>
                                  <input type="date" class="form-control" name="date_transfer" required>
                                </div>
                                <div class="col-6">
                                  <label>เวลาโอนเงิน</label>
                                  <input type="time" class="form-control" name="time_transfer" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-12 " style="margin: 0px;padding: 0px !important">
                                <label>หมายเหตุ</label>
                                <textarea name="more_detail" class="form-control"></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-12" style="margin: 0px;padding: 0px !important">
                                <label>แนบหลักฐาน (jpg png)</label>
                                <br>
                                <input type="file" name="image" class="text-center center-block file-upload" value="" required>
                              </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                {{-- <div class="col-md-6 col-6"> --}}
                                <div class="col-md-6 col-6" style="text-align: right;">
                                    <button type="cancel" class="genric-btn danger-border circle">ยกเลิก</button>
                                </div>
                                {{-- </div> --}}
                                <div class="col-md-6 col-6">
                                    <button type="submit" class="genric-btn success circle">เเจ้งชำระเงิน</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form card cc payment -->
            </div>            
        </div>
    </div>
</div>

@endsection

@section('footer-js')

@endsection