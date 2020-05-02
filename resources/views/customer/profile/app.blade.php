@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'แก้ไขข้อมูลส่วนตัว')

@section('header-css')
<link rel="stylesheet" href="/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
@endsection

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <form action="{{ route('editprofile') }}" method="POST">
                @csrf
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>คำนำหน้า</label>
                        <select class="form-control" name="title">
                            <option value="0">--เลือก--</option>
                            @foreach ($l_title as $item)
                            <option value="{{ $item->id }}" @if (isset($user->profile->title_id) &&
                                ($user->profile->title_id == $item->id)) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label>ชื่อ</label>
                        <input name="first_name" type="text" class="form-control" @if(isset($user->profile->first_name)
                        &&
                        ($user->profile->first_name)) value="{{$user->profile->first_name}}" @endif required>
                    </div>
                    <div class="form-group col-md-5">
                        <label>นามสกุล</label>
                        <input name="last_name" type="text" class="form-control" @if(isset($user->profile->last_name)
                        &&
                        ($user->profile->last_name)) value="{{$user->profile->last_name}}" @endif required>
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label>วัน-เดือน-ปีเกิด</label>
                        <input name="birth_date" type="text" class="form-control" @if(isset($user->profile->birthdate)
                        &&
                        ($user->profile->birthdate))
                        value="{{date('d-m-Y', strtotime($user->profile->birthdate))}}" @endif required readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label>ที่อยู่</label>
                        <input name="address" type="text" class="form-control" @if(isset($user->profile->address)
                        &&
                        ($user->profile->address)) value="{{$user->profile->address}}" @endif>
                    </div>

                    <div class="form-group col-md-4">
                        <label>จังหวัด</label>
                        <select class="form-control" name="province">
                            <option value="0">--เลือกจังหวัด--</option>
                            @foreach ($l_province as $item)
                            <option value="{{$item->id}}" @if (isset($user->profile->province_id) &&
                                ($user->profile->province_id == $item->id)) selected @endif >{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label>อำเภอ</label>
                        <select class="form-control" name="amphure" @if (!isset($user->profile->amphure_id)) disabled
                            @endif>
                            <option value="0">--เลือกอำเภอ--</option>
                            @foreach ($l_amphure as $item)
                            <option value="{{$item->id}}" @if (isset($user->profile->amphure_id) &&
                                ($user->profile->amphure_id == $item->id)) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>ตำบล</label>
                        <select class="form-control" name="district" @if (!isset($user->profile->district_id))
                            disabled @endif>
                            <option value="0">--เลือกตำบล--</option>
                            @foreach ($l_district as $item)
                            <option value="{{$item->id}}" @if (isset($user->profile->district_id) &&
                                ($user->profile->district_id == $item->id)) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>เบอร์โทร</label>
                        <input name="tel" type="text" class="form-control" onkeypress="return isNumberKey(event)"
                            @if(isset($user->profile->tel)
                        &&
                        ($user->profile->tel)) value="{{$user->profile->tel}}" @endif>
                    </div>
                </div>

                <div class="button-group-area center">
                    <button type="submit" class="genric-btn primary-border circle">บันทึก</button>
                    <button type="reset" class="genric-btn danger-border circle">ยกเลิก</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection

@section('footer-js')
<script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
    const elm_province = $('select[name="province"]')
    const elm_amphure = $('select[name="amphure"]')
    const elm_district = $('select[name="district"]')

    $('input[name="birth_date"]').datepicker({
        locale: moment().local('th'),
        format: 'dd-mm-yyyy',
        autoclose: true,
        endDate: moment().subtract(18, 'years').toDate()
    });

    $(elm_province).on('change', function () {
        if ($(this).val() == 0) { 
            $(elm_amphure).empty()
            $(elm_amphure).prop('disabled', true)
        }else {
            CallAmphure($(this).val())      
            $(elm_amphure).prop('disabled', false)
        }
        $(elm_district).empty()
        $(elm_district).prop('disabled', true)
        $(elm_amphure).append(`<option value='0'>--เลือกอำเภอ--</option>`)
        $(elm_district).append(`<option value='0'>--เลือกตำบล--</option>`)
    })
    
    $(elm_amphure).on('change', function (){
        if ($(this).val() == 0) { 
            $(elm_district).empty()
            $(elm_district).prop('disabled', true)
        }else {
            CallDistrict($(this).val())      
            $(elm_district).prop('disabled', false)
        }
        $(elm_district).append(`<option value='0'>--เลือกตำบล--</option>`)
    })

    function CallAmphure (province_id) {
        $.ajax({
            url: '/api/list/amphure/' + province_id,
        }).done(function (response) {
            $(elm_amphure).empty()
            let option = `<option value='0'>--เลือกอำเภอ--</option>`
            if (response.data.length) {
                response.data.forEach(element => {
                    option += `<option value='`+element.id+`'>`+element.name+`</option>`
                });
            }
            $(elm_amphure).append(option)
        })
    }

    function CallDistrict (amphure_id){
        $.ajax({
            url: '/api/list/district/' + amphure_id,
        }).done(function (response) {
            $(elm_district).empty()
            let option = `<option value='0'>--เลือกตำบล--</option>`
            if (response.data.length) {
                response.data.forEach(element => {
                    option += `<option value='`+element.id+`'>`+element.name+`</option>`
                });
            }
            $(elm_district).append(option)
        })
    }

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }  
</script>

@endsection