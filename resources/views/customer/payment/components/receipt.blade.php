@extends('customer.layouts.app')

@section('title', 'เเจ้งชำระเงิน')

@section('header-css')

@endsection

@section('content')

<div align="center"><img src="https://obs.line-scdn.net/0hHr0B2qf4F10NOzxcOvBoCjdtFDI-VwReaQ1GXlFVSWl1DFcJYVUKaCFoHWhwWVADYw5bPCgyDGxwW1MMMVQK/w644" style="width: 100px;height: 100px"></div>
    
<table style="width: 100%;margin-top: 20px">
    <tr>
        <td align="center" style="font-size: 20px;font-weight: bold;">
            Wichian Ganchang
        </td>
    </tr>
</table>  
    
    
<table style="width: 100%;margin-top: 20px">
    <tr>
        <td align="center" style="font-size: 20px;font-weight: bold;">
            ใบเสร็จรับเงิน
        </td>
    </tr>
</table>  
    
<table style="width: 100%;margin-top: 20px">
    <tr>
        <td>
            ชื่อลูกค้า : xxxxxxxxxxxxxxxxxxxxxx
        </td>
        <td align="right">
        วันที่สั่งซื้อ : xxxxxxxxxxxxxxxxxxxxxxx
        </td>
    </tr>

    <tr>
        <td>
            เลขที่ตำสั่งซื้อ : xxxxxxxxxxxxxxxxxxxxxx
        </td>
    </tr>
</table>
    
<table style="width:100%;margin-top: 20px">
    <tr align="center">
        <th align="center">รายการ</th>
        <th align="center">จำนวนชิ้น</th>
        <th align="center">จำนวนเงิน (บาท)</th>
    </tr>
    <tr align="center">
        <td align="center">เกรงประตู</td>
        <td align="center">2</td>
        <td align="center">2000</td>
    </tr>
</table>

<table style="width:100%;margin-top: 50px">
    <tr>
        <th style="text-align: right" colspan="2">ราคารวม</th>
        <th style="text-align: center">4000</th>
    </tr>
</table>

<table style="width: 100%;margin-top: 20px">
    <tr>
        <td>
            สถานที่ติดตั้ง : xxxxxxxxxxxxxxxxxxxxxx
        </td>
    </tr>
</table>


<div align="right" style="margin-top: 50px">วันที่พิมพ์ <?php echo date('d-m-Y h:i:s'); ?></div>

    
    

@endsection

@section('footer-js')

@endsection
