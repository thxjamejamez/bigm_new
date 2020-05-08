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
             รายการสั่งซื้อของ xxxxxxxxxxxxxxx
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
                     <span style="color: black">ขนาด</span> 110*110 <span>เซนติเมตร</span>
                    </div>

                    <div style="font-size: 16px;margin-top: 5px">
                      <span style="color: black">ราคา</span> 365 <span>บาท</span> 
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
                   <span style="color: black">ขนาด</span> 110*110 <span>เซนติเมตร</span>
                  </div>

                  <div style="font-size: 16px;margin-top: 5px">
                    <span style="color: black">ราคา</span> 365 <span>บาท</span> 
                  </div>
                </div>
             </div>
           </div>

           <div style="font-size: 20px;margin-top: 20px;color: black">สถานที่ติดตั้ง</div>  
           <div>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</div>

           <div style="font-size: 20px;margin-top: 20px;color: black">วันที่ติดตั้ง </div>
           <div>6 มิถุนายน 2563</div>

       </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">เพิ่มข้อมูลสินค้า</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form>
              <div>
                  <span>ชื่อสินค้า</span>
                  <input type="text" name="" class="form-control" required>
              </div>
              <div>
                  <span>รายละเอียดสินค้า</span>
                  <textarea style="height: 100px" class="form-control"></textarea>
              </div>
              <div class="mt-2">
                  <span>ราคา (บาท)</span>
                  <input type="text" name="" class="form-control" required>
              </div>
              <div class="mt-2">
                  <span>ขนาด (เซนติเมตร)</span>
                  <input type="text" name="" class="form-control" required>
              </div>
              <div class="mt-2">
                  <span>ภาพสินค้า</span>
                  <input type="file" name="" class="form-control" required>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                  <button type="Submit" class="btn btn-primary">บันทึก</button>
              </div>
          </form>
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