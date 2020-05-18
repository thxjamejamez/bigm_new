@extends('apanel.layouts.app')

@section('title', 'รายละเอียดสินค้า')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
  div.order-group {
    padding: 10px;
    background-color: whitesmoke;
  }

  label.order-no {
    padding: 7px 0;
  }

  .text-head {
    color: black;
    font-weight: 600;
    /* font-size: 17px; */
  }

  .big-size {
    font-size: 17px;
  }

  .bold {
    font-weight: 600;

  }
</style>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div style="display: flex;">
      <div style="margin-top: 10px;">
        <h6 class="m-0 font-weight-bold text-primary">
          รายละเอียดคำสั่งซื้อ
        </h6>
      </div>
    </div>
  </div>
  <div class="card-body">

    <div class="rows mb-3">
      <div class="card">
        <div class="card-header text-center">
          หมายเลขคำสั่งซื้อ {{sprintf("ORD%05d", $order->id)}}
        </div>
        <div class="card-body">
          <p class="card-text">
            <span style="color: black">สถานะคำสั่งซื้อ: </span>
            <span>{{$order->status}}</span>
          </p>
          <p class="card-text">
            <span style="color: black">ที่อยู่การติดตั้ง: </span>
            <span>{{$order->address}}
              ต.{{$order->district_name}} อ.{{$order->amphure_name}}
              จ.{{$order->province_name}}</span>
          </p>
          <p class="card-text">
            <span style="color: black">วันเวลาที่ติดตั้ง: </span>
            <span>{{date('d-m-Y H:i:s', strtotime($order->send_datetime))}}</span>
          </p>
          <p class="card-text">
            <span style="color: black">รายละเอียดการชำระเงิน: </span>
            <span><a href="{{route('detailCheckPayMent', ['id' => $order->id])}}" target="_blank">เรียกดู</a></span>
          </p>
        </div>
      </div>
    </div>

    <div class="rows mb-3">
      <div class="card">
        <div class="card-header text-center">
          รายละเอียดสินค้า
        </div>
        <div class="card-body">
          <p class="card-text">
            @foreach ($product as $pd_item)
            <div class="col-lg-12">
              <blockquote class="generic-blockquote" style="background-color: #f6f7f7 !important;border-radius: 5px">

                <div class="row p-3">
                  <div class="col-md-4 d-flex justify-content-center">
                    <img style="height: 150px; width:150px"
                      src="{{($pd_item->img_path) ? $pd_item->img_path : '/img/defualt_product.jpg'}}">
                  </div>

                  <div class="col-md-8 mb-3">
                    <div class="head-pddetail row mb-3">
                      <div class="col-md-6 text-center">
                        <span class="text-head">
                          ขนาดสินค้า (เซนติเมตร)
                        </span>
                      </div>
                      <div class="col-md-3 text-center">
                        <span class="text-head">
                          จำนวน
                        </span>
                      </div>
                      <div class="col-md-3 text-center">
                        <span class="text-head">
                          ราคาต่อหน่วย
                        </span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6 text-center">
                        @foreach ($pd_item->details as $details_item)
                        <p>{{$details_item->size}}</p>
                        @endforeach
                      </div>

                      <div class="col-md-3 text-center">
                        @foreach ($pd_item->details as $details_item)
                        <p>{{$details_item->qty}}</p>
                        @endforeach
                      </div>

                      <div class="col-md-3 text-center">
                        @foreach ($pd_item->details as $details_item)
                        <p>{{number_format($details_item->price_per_unit, 2)}}</p>
                        @endforeach
                      </div>
                    </div>
                  </div>

                </div>

              </blockquote>
            </div>
            @endforeach

            <div class="col-lg-12">
              <blockquote class="generic-blockquote" style="background-color: #f6f7f7 !important;border-radius: 5px">

                <div class="row p-3 justify-content-center">
                  <div class="col-md-12 text-right">
                    <label class="big-size text-head bold">ราคารวม: </label>
                    <label class="big-size">{{number_format($order->amount, 2)}} บาท</label>
                  </div>
                </div>

              </blockquote>
            </div>
          </p>
        </div>
      </div>
    </div>

    @if($order->order_status == 5)
    <div class="rows mb-3">
      <div style="text-align: right">
        <a href="{{route('changeOrderToDone', ['order_id' => $order->id])}}" class="btn btn-success">
          จัดทำสินค้าเรียบร้อยแล้ว
        </a>
      </div>
    </div>
    @endif

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