@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'แก้ไขข้อมูลส่วนตัว')

@section('content')

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">

            <form action="login" method="POST">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        {{var_dump($user)}}
                        <div class="col-lg-6 form-group input-center">
                            <input name="email" placeholder="อีเมล์หรือชื่อผู้ใช้" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'อีเมล์หรือชื่อผู้ใช้'"
                                class="common-input mb-20 form-control" required="" type="text" />

                            <input name="password" placeholder="รหัสผ่าน" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'รหัสผ่าน'" class="common-input mb-20 form-control"
                                required="" type="password" />
                            <div class="button-group-area center">
                                <button type="submit" class="genric-btn success radius">เข้าสู่ระบบ</button>
                                <a href="/forgotPassword" class="genric-btn primary radius">ลืมรหัสผ่าน</a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection