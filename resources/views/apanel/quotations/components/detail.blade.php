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
                การนัดหมายของ  xxxxxxxxxxxxx
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
                  <div class="col-md-6" >
                    <img style="max-width: 220px;max-height: 130px;border-radius: 10px" src="https://i.ytimg.com/vi/P5NDgc6kEVM/maxresdefault.jpg">
                  </div>

                  <div class="col-md-6">
                    <div style="font-size: 18px;color:black;">
                      ประตูบานเกรด
                    </div>

                    <div style="font-size: 16px;margin-top: 10px">
                     <span style="color: black">ขนาด</span> ยังไม่ทราบขนาด
                    </div>

                    <div style="font-size: 16px;margin-top: 5px">
                      <span style="color: black">ราคา</span> ยังไม่ทราบราคา 
                    </div>
                  </div>
               </div>

               <div class="row" style="margin-top: 10px">
                <div class="col-md-6" >
                  <img style="max-width: 220px;max-height: 130px;border-radius: 10px" src="https://i.ytimg.com/vi/P5NDgc6kEVM/maxresdefault.jpg">
                </div>

                <div class="col-md-6">
                  <div style="font-size: 18px;color:black;">
                    ประตูบานเกรด
                  </div>

                  <div style="font-size: 16px;margin-top: 10px">
                   <span style="color: black">ขนาด</span> ยังไม่ทราบขนาด
                  </div>

                  <div style="font-size: 16px;margin-top: 5px">
                    <span style="color: black">ราคา</span> ยังไม่ทราบราคา 
                  </div>
                </div>
             </div>
           </div>

           <div style="font-size: 20px;margin-top: 20px;color: black">สถานที่นัดหมาย</div>  
           <div>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</div>

           <div style="font-size: 20px;margin-top: 20px;color: black">วันที่นัดหมายการวัด </div>
           <div>6 มิถุนายน 2563</div>

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