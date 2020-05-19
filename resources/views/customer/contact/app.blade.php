@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'เกี่ยวกับเรา')

@section('header-css')

@endsection

@section('content')

<div class="container">
    <div class="section-top-border">
        <!-- Start contact-page Area -->
        <section class="contact-page-area section-gap" style="padding: 29px;">
            <div class="container">
                <div class="row">
                    <div class="map-wrap" style="width:100%; height: 445px;">
                        <iframe <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d491687.8535355037!2d99.9983745!3d15.6816176!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5456a1904652dbaa!2z4Lin4Li04LmA4LiK4Li14Lii4Lij4LiB4Liy4Lij4LiK4LmI4Liy4LiHIOC4lOC4reC4meC5guC4oeC5iA!5e0!3m2!1sth!2sth!4v1589857638042!5m2!1sth!2sth"
                            width="100%" height="455" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-12  d-flex flex-column address-wrap">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="single-contact-address d-flex flex-row">
                                    <div class="icon">
                                        <span class="lnr lnr-home"></span>
                                    </div>
                                    <div class="contact-details">
                                        <p style="font-size: 16px;margin-bottom: 6px;">ร้านวิเชียร การช่าง</p>
                                        <p style="font-size: 16px">
                                            184/2 ม.8 ต.สระแก้ว อ.ลาดยาว จ.นครสวรรค์ 60150
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="single-contact-address d-flex flex-row">
                                    <div class="icon">
                                        <span class="lnr lnr-phone-handset"></span>
                                    </div>
                                    <div class="contact-details">
                                        <p style="font-size: 16px;margin-bottom: 6px;">081-8865896</p5>
                                            <p style="font-size: 16px" class="pd-0">081-9534256</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="single-contact-address d-flex flex-row">
                                    <div class="icon">
                                        <span class="lnr lnr-envelope"></span>
                                    </div>
                                    <div class="contact-details">
                                        <p style="font-size: 16px">support@colorlib.com</p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End contact-page Area -->

    </div>
</div>
@endsection

@section('footer-js')

@endsection