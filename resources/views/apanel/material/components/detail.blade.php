@extends('apanel.layouts.app')

@section('title', 'รายละเอียดสินค้า')

@section('header-css')
<style>
  .center {
    margin: 0 auto;
    float: none;
    margin-bottom: 10px;
  }
</style>
<link href="/plugins/apanel/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="card shadow mb-4 center" style="width:80%">
  <div class="card-header py-3">
    <div style="display: flex;">
      <div style="margin-top: 10px;">
        <h6 class="m-0 font-weight-bold text-primary">
          รายละเอียดรูปวัตถุดิบ
        </h6>
      </div>
    </div>
  </div>

  <form action="{{route('updateMaterialFormat', ['id' => $decorative->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="col-md-12">

        <div class="row">
          <div class="col-md-4 mx-auto mb-3">
            @if($decorative->img_path)
            <img class="rounded mx-auto d-block" style="max-width: 250px;max-height: 250px;border-radius: 10px"
              src="{{$decorative->img_path}}">
            @else
            <input class="form-control" type="file" name="img_material" required>
            @endif   
          </div>
        </div>
        @if($decorative->img_path)
        <div class="row">
          <div class="col-md-4 mx-auto mb-3">
            <div class="button-group-area text-center">
              <a href="{{route('RemoveDecorativePic', ['id' => $decorative->id])}}">ลบรูปภาพ</a>
            </div>
          </div>
        </div>
        @endif

        <div class="row">
          <div class="col-md-4 mx-auto mb-3">
            <div style="font-size: 24px;color:black; text-align:center;">
              <input name="name_material" type="text" class="form-control" value="{{$decorative->name}}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mx-auto">
            <div class="button-group-area text-center">
              <button type="submit" class="btn btn-success">บันทึก</button>
              <a href="{{route('viewProduct')}}" class="btn btn-danger">ยกเลิก</a>
            </div>
          </div>
        </div>

      </div>
    </div>

  </form>
</div>

@endsection

@section('footer-js')
<script src="/plugins/apanel/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/apanel/datatables/dataTables.bootstrap4.min.js"></script>

<script>
  $('#dataTable').DataTable()
</script>
@endsection