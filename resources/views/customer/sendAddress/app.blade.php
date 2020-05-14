@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'ที่อยู่การติดตั้ง')

@section('header-css')
<style>
    .label-green {
        padding: 5px;
        color: white;
        background-color: #4CAF50;
        border-radius: 15%;
        height: fit-content;
        width: fit-content;
    }
</style>
@endsection

@section('content')

<div id="app" class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            @if (isset($permission_add) && $permission_add)
            <div class="col-md-12 text-center">
                <a href="#" class="genric-btn primary-border circle mb-30" @click="showModal('add')">+
                    เพิ่มข้อมูลที่อยู่การติดตั้ง</a>
            </div>
            @if(empty($list_address))
            <div class="col-md-12 text-center">
                No result.
            </div>
            @else
            @foreach ($list_address as $item)
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    {{ $item->address }} ตำบล{{ $item->district_name }} อำเภอ{{ $item->amphure_name }}
                                    จังหวัด{{ $item->province_name }}
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    @if($item->defualt)
                                    <span class="label-green align-self-center">ค่าเริ่มต้น</span>
                                    @endif
                                </div>
                                <div class="col-md-4 d-flex justify-content-center">
                                    <div>
                                        <a href="#" class="genric-btn primary circle"
                                            @click="showModal('edit', {{ $item->id }})">
                                            <span class="lnr lnr-pencil" style="font-size: 16px"></span>
                                        </a>
                                        <a href="#" class="genric-btn danger circle"
                                            @click="removeAddress({{ $item->id }})">
                                            <span class="lnr lnr-trash" style="font-size: 16px"></span>
                                        </a>

                                        @if(!$item->defualt)
                                        <a href="{{route('editdefaultAddress',['id'=>$item->id])}}" class="genric-btn success circle">
                                            <span style="font-size: 12px">ตั้งเป็นค่าตั้งต้น</span>
                                        </a>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">ไม่สามารถทำการเพิ่มข้อมูลที่อยู่ในการติดตั้งได้</h4>
                <p style="font-size: 100px; text-align: center; padding: 10px;"><span
                        class="lnr lnr-cross-circle"></span></p>
                <hr>
                <p class="mb-0">กรุณาแก้ไขข้อมูลส่วนตัวให้ถูกต้อง</p>
            </div>
            @endif
        </div>

        <!-- Modal -->
        <form v-bind:action="action.set_modal.form_action" method="POST">
            @csrf
            <div id="form-sendAddress" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="exampleModalLabel" style="font-size: 20px;">
                                @{{ action.set_modal.header }}</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-12">
                                    <label>ที่อยู่</label>
                                    <input v-model="form.address" name="address" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-6">
                                    <label>จังหวัด</label>
                                    <select name="province" class="form-control" v-model="form.province"
                                        @change="callAmphure(form.province)">
                                        <option value="0">--เลือกจังหวัด--</option>
                                        <option v-for="item in lib.province" :value="item.id">
                                            @{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>อำเภอ</label>
                                    <select name="amphure" class="form-control" v-model="form.amphure"
                                        @change="callDistrict(form.amphure)" :disabled="form.province == 0">
                                        <option value="0">--เลือกอำเภอ--</option>
                                        <option v-for="item in lib.amphure" :value="item.id">
                                            @{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ตำบล</label>
                                    <select name="district" class="form-control" v-model="form.district"
                                        :disabled="form.amphure == 0">
                                        <option value="0">--เลือกตำบล--</option>
                                        <option v-for="item in lib.district" :value="item.id">
                                            @{{ item.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary"
                                    data-dismiss="modal">@{{ action.set_modal.btn_cancel }}</button>
                                <button type="submit" class="btn btn-primary">@{{ action.set_modal.btn_save }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>


@endsection

@section('footer-js')
<script src="/js/customer/sendAddress/app.js"></script>
<script>
    @if (session()->has('updated'))
        Swal.fire(
            'สำเร็จ',
            'แก้ไขข้อมูลที่อยู่การติดตั้งเรียบร้อยแล้ว',
            'success'
        )
    @elseif(session()->has('created'))
        Swal.fire(
            'สำเร็จ',
            'เพิ่มข้อมูลที่อยู่การติดตั้งเรียบร้อยแล้ว',
            'success'
        )
    @elseif(session()->has('deleted'))
    Swal.fire(
            'สำเร็จ',
            'ลบข้อมูลที่อยู่การติดตั้งเรียบร้อยแล้ว',
            'success'
        )
    @endif
</script>
@endsection