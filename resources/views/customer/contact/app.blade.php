@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'เกี่ยวกับเรา')

@section('header-css')

@endsection

@section('content')

<div class="container" >
    <div class="section-top-border">
			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap" style="padding: 29px;">
				<div class="container">
					<div class="row">
                        <div class="map-wrap" style="width:100%; height: 445px;" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10682.271241993594!2d98.95073177189323!3d18.809148204034532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c0026152fc6a3df!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lij4Liy4LiK4Lih4LiH4LiE4Lil4Lil4LmJ4Liy4LiZ4LiZ4LiyKOC4p-C4tOC4l-C4ouC4suC5gOC4guC4leC4oOC4suC4hOC4nuC4suC4ouC4seC4nik!5e0!3m2!1sth!2sth!4v1587963981874!5m2!1sth!2sth" width="100%" height="445" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
						<div class="col-lg-12  d-flex flex-column address-wrap">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single-contact-address d-flex flex-row">
                                        <div class="icon">
                                            <span class="lnr lnr-home"></span>
                                        </div>
                                        <div class="contact-details">
                                            <p style="font-size: 16px;margin-bottom: 6px;" >ร้านวิเชียร การช่าง</p>
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
                                            <p style="font-size: 16px;margin-bottom: 6px;" >081-8865896</p5>
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
