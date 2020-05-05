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
             รายละเอียดสินค้า
           </h6>
         </div>
         <div style="margin-left: auto;">
          <div>
              <button class="btn btn-warning" data-toggle="modal" data-target="#staticBackdrop">
                  เเก้ไขข้อมูล
              </button>
          </div>
      </div>
       </div>
     </div>
     <div class="card-body">
           <div class="col-md-12">
               <div class="row">
                  <div class="col-md-6" >
                    <img style="max-width: 500px;max-height: 600px;border-radius: 10px" src="https://i.ytimg.com/vi/P5NDgc6kEVM/maxresdefault.jpg">
                  </div>

                  <div class="col-md-6">
                    <div style="font-size: 30px;color:black;">
                      ประตูบานเกรด
                    </div>

                    <div style="font-size: 16px;margin-top: 5px">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>

                    <div style="font-size: 16px;margin-top: 20px">
                     <span style="color: black">ขนาด</span> 110*110 <span>เซนติเมตร</span>
                    </div>

                    <div style="font-size: 16px;margin-top: 5px">
                      <span style="color: black">ราคา</span> 365 <span>บาท</span> 
                    </div>

                    <div style="font-size: 16px;margin-top: 5px">
                      <span style="color: black">สถานนะ</span> <span> ขายอยู่</span> 
                    </div>

                  </div>

               </div>
           </div>

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