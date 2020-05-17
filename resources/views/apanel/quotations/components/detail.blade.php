@extends('apanel.layouts.app')

@section('title', 'รายละเอียดสินค้า')

@section('header-css')
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <div style="display: flex;">
         <div style="margin-top: 10px;">
           <h6 class="m-0 font-weight-bold text-primary">
                การนัดหมายของ  {{$quotationsDetail[0]->first_name}} {{$quotationsDetail[0]->last_name}}
           </h6>
         </div>
         {{-- <div style="margin-left: auto;">
          <div>
              <button class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                  ยกเลิก
              </button>
          </div>
         </div> --}}
       </div>
     </div>
     <div class="card-body">
           <div style="font-size: 20px;color: black">รายการสินค้าที่สั่งซื้อ</div>  
           <div class="col-md-12">
               <div class="row" style="margin-top: 10px">

                @foreach ($quotationsDetail as $item)

                  <div class="col-md-6" >
                    <img style="max-width: 220px;max-height: 130px;border-radius: 10px" src="{{$item->img_path}}">
                  </div>

                  <div class="col-md-6">
                    <div style="font-size: 18px;color:black;">
                     {{$item->pd_cate_name}}
                    </div>

                    <div style="font-size: 16px;margin-top: 10px">
                     <span style="color: black">ขนาด</span> ยังไม่ทราบขนาด
                    </div>

                    <div style="font-size: 16px;margin-top: 5px">
                      <span style="color: black">ราคา</span> ยังไม่ทราบราคา 
                    </div>
                  </div>
                  @endforeach

               </div>
           </div>

           <div style="font-size: 20px;margin-top: 20px;color: black">สถานที่นัดหมาย</div>  
           <div>{{$item->address}}</div>

           <div style="font-size: 20px;margin-top: 20px;color: black">วันที่นัดหมาย </div>
           <div>{{$item->appointment_datetime}}</div>

            <div style="text-align: right">
                <div>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                        ยกเลิก
                    </button>

                    <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                        ยืนยันการวัดขนาด
                    </button>
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