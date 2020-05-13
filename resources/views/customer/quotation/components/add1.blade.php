@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ขอใบเสนอราคา')

@section('header-css')
<style>
  img {
    max-height: 255px;
    max-width: 255px;
  }

  img.small {
    max-height: 75px;
    max-width: 75px;
  }

  .text-head {
    color: black;
    font-weight: 600;
    font-size: 17px;
  }
</style>
@endsection

@section('content')
<div id="app" class="whole-wrap">
  <div class="container">


    <div class="section-top-border">
      <div class="row">

        <div class="col-lg-12">
          <button type="button" class="btn btn-primary pull-right mb-10" @click="toggleModal()">
            เพิ่มรูปแบบ
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">

          <blockquote v-for="pd in controls.product" class="generic-blockquote">
            <div class="row">
              <div class="col-md-4 d-flex justify-content-center">
                <img :src="pd.pd_f_img">
              </div>

              <div class="col-md-8 mb-3">
                <div class="head-pddetail row mb-3">
                  <div class="col-md-6 text-center">
                    <span class="text-head">
                      ขนาดสินค้า
                    </span>
                  </div>
                  <div class="col-md-3 text-center">
                    <span class="text-head">
                      จำนวน
                    </span>
                  </div>
                  <div class="col-md-3 text-center">
                  </div>

                </div>

                <div v-for="detail in pd.pd_details" class="row mb-3">

                  <div class="col-md-6">
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="detail.size">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      <input type="number" class="form-control" v-model="detail.qty">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <button class="btn">ssdsad</button>
                  </div>

                </div>

              </div>

            </div>
          </blockquote>


        </div>
      </div>
    </div>
  </div>

  {{-- start modal --}}
  <div class="modal fade" id="add-productformat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <span class="modal-title text-head">เพิ่มรูปแบบสินค้าเพื่อขอใบเสนอราคา</span>
          <button type="button" class="close" @click="toggleModal()">
            <span aria-hidden="true">&times;</span>
        </div>

        <div class="modal-body">
          <ul class="list-group">
            <li v-for="item in controls.modal" class="list-group-item">
              <div class="row">
                <div class="col-md-4">
                  <img class="small rounded mx-auto d-block" :src="item.img_path">
                </div>
                <div class="col-md-8">3:50</div>
              </div>
            </li>
          </ul>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="addProductFormat()">เพิ่ม</button>
          <button type="button" class="btn btn-secondary" @click="toggleModal()">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end modal --}}

</div>
@endsection

@section('footer-js')
<script src="/js/customer/quotation/addtype1.js"></script>
@endsection