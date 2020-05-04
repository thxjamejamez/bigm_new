@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')
@php
$sum = 0;
@endphp

<div id="app" class="container">
  <form action="{{ route('storeOrder') }}" method="POST">
    @csrf
    <div class="section-top-border">
      @if(!$can_order)
      <div class="alert alert-danger" role="alert">
        กรุณาเพิ่มข้อมูลที่อยู่การติดตั้ง
      </div>
      @endif
      <div style="font-size: 20px;font-weight: bold">ตะกร้าสินค้า</div>
      <div style="margin-top: 10px">
        <table class="table table-hover">
          <thead>
            <tr style="text-align: center">
              <th scope="col" style="width: 30%">รายการ</th>
              <th scope="col">ราคาต่อชิ้น (บาท)</th>
              <th scope="col">จำนวน (ชิ้น)</th>
              <th scope="col">ราคารวม (บาท)</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
          <tbody>
            @if(\Session::get('cart'))
            @foreach (\Session::get('cart') as $item)
            <input name="product[]" type="hidden" value="{{$item['product_id']}}">
            <tr style="text-align: center">
              <th scope="row" style="text-align: center">
                <img style="width: 200px"
                  src="{{($item['img_path']) ? $item['img_path']: '/img/defualt_product.jpg' }}">
                <div style="margin-top: 5px">{{$item['product_name']}}</div>
              </th>
              <td>{{ number_format($item['price'], 2) }}</td>
              <td>{{ $item['qty'] }}</td>
              <td>{{ number_format($item['price'] * $item['qty'], 2) }}</td>
              <td style="color: red"><span class="lnr lnr-trash"></span></td>
            </tr>
            @php
            $sum += ($item['price'] * $item['qty']);
            @endphp
            @endforeach
            @else
            <tr style="text-align: center">
              <td colspan="5">No Result.</td>
            </tr>
            @endif

            <tr>
              <th colspan="3" style="font-weight: bold;font-size: 18px;text-align: right">ราคารวม</th>
              <td colspan="3" style="font-weight: bold;font-size: 18px;text-align: center">{{ number_format($sum, 2) }}
                บาท</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="form-row justify-content-center">
        <div class="form-group col-md-6">
          <label>ที่อยู่การติดตั้ง</label>
          <select class="form-control" name="province">
            <option value="0">--เลือกที่อยู่การติดตั้ง--</option>
            @foreach ($send_address as $item)
            <option value="{{$item->id}}" @if($item->defualt) selected @endif>{{$item->address}}
              ต.{{$item->district_name}} อ.{{$item->amphure_name}}
              จ.{{$item->province_name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-12 text-center">
        <button type="submit" class="genric-btn primary-border circle mb-30 @if(!$can_order) disable @endif"
          style="width: 300px;">สั่งซื้อสินค้า</button>
      </div>

    </div>
  </form>
</div>
@endsection

@section('footer-js')
<script>
  $('.disable').click(function(e){
    e.preventDefault();
  })


</script>
@endsection