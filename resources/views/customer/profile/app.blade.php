@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'แก้ไขข้อมูลส่วนตัว')

@section('header-css')
<link rel="stylesheet" href="/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">

            <form action="{{ route('editprofile', ['id' => \Auth::user()->id]) }}" method="POST">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-1">
                        <label>คำนำหน้า</label>
                        <select class="form-control">
                            @foreach ($l_title as $item)
                            <option value="{{ $item->id }}" @if (isset($user->profile->title_id) &&
                                ($user->profile->title_id == $item->id)) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>ชื่อ</label>
                        <input name="first_name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>นามสกุล</label>
                        <input name="last_name" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-md-5">
                        <label>วัน-เดือน-ปีเกิด</label>
                        <input name="birth_date" type="text" class="form-control" required>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>


@endsection

@section('footer-js')
<script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
    $('input[name="birth_date"]').datepicker({
        maxDate: moment().subtract(18, 'years')
    });
</script>
@endsection