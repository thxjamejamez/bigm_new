@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'สินค้า')

@section('header-css')

@endsection

@section('content')

<div class="container" >
    <div class="section-top-border">
        <div style="font-size: 20px;font-weight: bold">ตะกร้าสินค้า</div>
        <div style="margin-top: 10px">
            <table class="table table-hover">
                <thead>
                  <tr style="text-align: center">
                    <th  scope="col" style="width: 30%">รายการ</th>
                    <th  scope="col">ราคาต่อชิ้น (บาท)</th>
                    <th  scope="col">จำนวน (ชิ้น)</th>
                    <th  scope="col">ราคารวม (บาท)</th>
                    <th  scope="col">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr style="text-align: center">
                    <th scope="row" style="text-align: center" >
                        <img style="width: 200px" src="https://f.ptcdn.info/115/028/000/1423052744-coach2-o.png">
                        <div style="margin-top: 5px">กระเป๋าหลุย</div>
                    </th>
                    <td>10.00</td>
                    <td>1</td>
                    <td>10.00</td>
                    <td style="color: red"><span class="lnr lnr-trash"></span></td>
                  </tr>

                  <tr style="text-align: center">
                    <th scope="row" style="text-align: center" >
                        <img style="width: 200px" src="https://f.ptcdn.info/115/028/000/1423052744-coach2-o.png">
                        <div style="margin-top: 5px">กระเป๋าหลุย</div>
                    </th>
                    <td>10.00</td>
                    <td>1</td>
                    <td>10.00</td>
                    <td style="color: red"><span class="lnr lnr-trash"></span></td>
                  </tr>

                  <tr>
                    <th colspan="3" style="font-weight: bold;font-size: 18px;text-align: right">ราคารวม</th>
                    <td colspan="3" style="font-weight: bold;font-size: 18px;text-align: center">20.00 บาท</td>
                  </tr>

                </tbody>
              </table>
        </div>
    </div>                     
</div>
@endsection

@section('footer-js')

@endsection
