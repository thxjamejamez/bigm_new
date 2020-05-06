@extends('apanel.layouts.app')

@section('title', 'รายละเอียดตรวจสอบการชำระเงิน')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <div style="display: flex;">
         <div style="margin-top: 10px;">
           <h6 class="m-0 font-weight-bold text-primary">
             รายละเอียดการชำระเงิน
           </h6>
         </div>
       </div>
     </div>
     <div class="card-body">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-6">
                       <table style="width: 100%;">
                           <tr style="text-align: left;">
                               <td>
                                   หมายเลขการจอง
                               </td>
                               <td>
                                   : xxxxxxxxxxxxxxxxxxx
                               </td>
                           </tr>
                           <tr style="text-align: left;">
                               <td>
                                   ชื่อผู้จอง
                               </td>
                               <td>
                                   : xxxxxxxxxxxxxxxxxxx
                               </td>
                           </tr>
                           <tr style="text-align: left;">
                               <td>
                                   เบอร์โทร
                               </td>
                               <td>
                                   : xxxxxxxxxxxxxxx
                               </td>
                           </tr>
                           <tr style="text-align: left;">
                               <td>
                                   วันที่จอง
                               </td>
                               <td>
                                       : xxxxxxxxxxxxxxxxxxxxxxx
                               </td>
                           </tr>
   
                           <tr style="text-align: left;">
                                   <td>
                                   ห้องที่ถูกจอง
                                   </td>
                                   <td>
                                       : xxxxxxxxxxxxx
                                   </td>   
                           </tr>
   
                           <tr style="text-align: left;">
                               <td>
                                   สถานะ
                               </td>
                               <td >
                                   : xxxxxxxxxxxx
                               </td>
                           </tr>
   
                           <tr style="text-align: left;">
                               <td>
                                   หมายเหตุ
                               </td>
                               <td >
                                   : xxxxxxxxxxx
                               </td>
                           </tr>
                       </table>
                   </div>
               </div>
           </div>
           <hr>
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-12" align="center">
                       <p>img</p>
          
                   </div>
               </div>
           </div>
           <hr>
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-6">
                       <table style="width: 100%;">
                           <tr style="text-align: left;">
                               <td>
                                   ชื่อบัญชี
                               </td>
                               <td>
                                   : xxxxxxxxxxx
                               </td>
                           </tr>
                           <tr style="text-align: left;">
                               <td>
                                   โอนไปธนาคาร
                               </td>
                               <td>
                                   : xxxxxxxxxxxxx
                               </td>
                           </tr>
                           <tr style="text-align: left;">
                               <td>
                                   จำนวนเงิน
                               </td>
                               <td>
                               : xxxxxxxxxxxxxxxxx
                               </td>
                           </tr>
                           <tr style="text-align: left;">
                               <td>
                               วันที่โอน
                               </td>
                               <td>
                               : xxxxxxxxxxxxxxxxxxxxxxx
                               </td>
                           </tr>
                           <tr style="text-align: left;">
                               <td>
                               เวลา
                               </td>
                               <td>
                               : xxxxxxxxxxxxxxx
                               </td>
                           </tr>
                       </table>
                   </div>
               </div>
           </div>
           <hr>
           <div align="center">
               <table>
                   <tr>
                       <td style="width: 140px;">
                           <a href="">
                                <button style="width: 100%;" class="btn btn-danger">
                                    ไม่ถูกต้อง
                                </button>
                           </a>
                       </td>
                       <td>
                           &nbsp;
                       </td>
                       <td style="width: 140px">
                           <a href="">
                                <button style="width: 100%;" class="btn btn-success">
                                    ถูกต้อง
                                </button>   
                           </a>
                       </td>
                   </tr>
               </table>
            
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