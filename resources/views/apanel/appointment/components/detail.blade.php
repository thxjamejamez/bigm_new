@extends('apanel.layouts.app')

@section('title', 'รายละเอียดการนัดหมาย')

@section('header-css')
<link rel="stylesheet" href="/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div style="display: flex;">
      <div style="margin-top: 10px;">
        <h6 class="m-0 font-weight-bold text-primary">
          การนัดหมายของ {{$appointmentDetail->first_name}} {{$appointmentDetail->last_name}}
        </h6>
      </div>

    </div>
  </div>
  <div class="card-body">
    <div style="font-size: 20px;color: black">รายการรูปแบบสินค้า</div>
    <div class="col-md-12">
      <div class="row" style="margin-top: 10px">

        @foreach ($product as $item)

        <div class="col-md-6">
          <img style="max-width: 220px;max-height: 130px;border-radius: 10px"
            src="{{($item->img_path) ? $item->img_path : '/img/defualt_product.jpg'}}">
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
    <div>{{$appointmentDetail->address}}
      ต.{{$appointmentDetail->district_name}} อ.{{$appointmentDetail->amphure_name}}
      จ.{{$appointmentDetail->province_name}}</div>

    <div style="font-size: 20px;margin-top: 20px;color: black">วันที่นัดหมาย</div>
    <div>{{date('d-m-Y H:i:s', strtotime($appointmentDetail->appointment_datetime))}}</div>

    <div style="font-size: 20px;margin-top: 20px;color: black">ประเภทการนัดหมาย</div>
    <div>@if ($appointmentDetail->appointment_type==1)
      วัดขนาดสินค้า
      @else
      ติดตั้งสินค้า
      @endif
    </div>

    <div style="font-size: 20px;margin-top: 20px;color: black">สถานะการนัดหมาย</div>
    <div>{{$appointmentDetail->status}}</div>

    <div style="text-align: right">
      <div>
        <button class="btn btn-danger"
          onclick="remove({{$appointmentDetail->id}}, {{$appointmentDetail->appointment_type}})">
          ปฏิเสธการนัดหมาย
        </button>

        <button class="btn btn-success">
          ตอบรับการนัดหมาย
        </button>

        <button class="btn btn-warning"
          onclick="RequireChangeDateTime({{$appointmentDetail->id}}, {{$appointmentDetail->appointment_type}})">
          ขอเปลี่ยนแปลงวันนัดหมาย
        </button>
      </div>
    </div>

  </div>

  <div class="modal fade" id="changeDateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <form
      action="{{route('changeAppointmentDate', ['id' => $appointmentDetail->id, 'type' => $appointmentDetail->appointment_type])}}"
      method="POST">
      @csrf
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ขอเปลี่ยนแปลงวันนัดหมาย</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 mx-auto mb-3">
                <input class="form-control" type="text" name="change_date" id="change_date" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </form>
  </div>

</div>


@endsection

@section('footer-js')
<script src="/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

<script>
  function remove(id, type) {
      const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
      title: 'คุณแน่ใจหรือ?',
      text: "คุณต้องการปฏิเสธการนัดหมายนี้",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'ใช่',
      cancelButtonText: 'ไม่ใช่',
      reverseButtons: true
      }).then((result) => {
      if (result.value) {
          window.location = '/apanel/appointment/' + id + '/' + type + '/remove'
      } else if (
          result.dismiss === Swal.DismissReason.cancel
      ) {
      }
      })
    }

    function RequireChangeDateTime (id, type) {
      $('#changeDateModal').modal()
      $("input[name='change_date']").datetimepicker({
            locale: moment().local("th"),
            format: "dd-mm-yyyy hh:i",
            autoclose: true,
            startDate: moment().add(3, "days").toDate(),
        });
    }
</script>
@endsection