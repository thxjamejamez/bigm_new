@extends('customer.layouts.app', ['banner' => $banners])

@section('title', 'เกี่ยวกับเรา')

@section('header-css')

@endsection

@section('content')

<div class="container" >
    <div class="section-top-border">
      <!-- Start home-about Area -->
			<section class="home-about-area section-gap">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 home-about-left">
							<img class="img-fluid" src="img/customer/img-banner.png" alt="">
						</div>
						<div class="col-lg-5 col-md-6 home-about-right">
							<p style="font-size: 18px">เกียวกับเรา</p>
							<p style="font-size: 45px;color: black" class="text-uppercase">วิเชียร์การช่าง</p>
							<p style="font-size: 16px">
								เราคือร้านทำ หน้าต่างเหล็กดัด หรือออกแบบหน้าต่างเอง ประเมินราคาฟรี มีแบบลายสวยๆ และทันสมัยให้เลือกมากมาย เราเลือกใช้แต่วัสดุเกรดดีในการผลิต ใส่ใจทุกรายละเอียดในการติดตั้ง การันตีว่างานดี ฝีมือเยี่ยม ผลิตและติดตั้งโดยทีมช่างมืออาชีพ ชัดเจน จริงใจ ไม่เอาเปรียบลูกค้า ใช้บริการกับเรา วิเชียร์การช่าง ไม่ผิดหวังอย่างแน่นอน!
							</p>
						
						</div>
						<div class="col-lg-12 pt-40">
							<p style="font-size: 16px">
								เราคือตัวจริงเรื่องหน้าต่างเหล็กดัดเราให้บริการผลิตและติดตั้ง หน้าต่างเหล็กดัด มาแล้วกว่า 25 ปี ยึดมั่นในความจริงใจในการให้บริการ ไม่เอาเปรียบลูกค้า ให้บริการด้วยใจ งานของเราๆใช้แต่วัสดุคุณภาพในการผลิต รวมไปถึงการเก็บรายละเอียดงานในการติดตั้ง ขอให้มั่นใจได้เลย

							</p>
						</div>
					</div>
				</div>	
			</section>
      <!-- End home-about Area -->	
			<section class="timeline pb-120">
        <div class="text-center">
            <div class="menu-content pb-70">
                <div class="title text-center">
                    <p class="mb-10" style="font-weight: bold;font-size: 40px;color: black">ไว้วางใจเรา</p>
                    <p class="mt-3">เรามีประสบการณ์การทำงานมาหลายปี ดังนั้นจึงรับประกันได้ว่าผลงานที่ออกมา จะไม่ทำให้ท่านผิดหวังเเน่นอน</p>
                </div>
            </div>
        </div>				
        <ul>
          <li>
            <div class="content" style="background-color: #e7f3f5 !important;">
              <div style="text-align: center;font-weight: bold;color: black;font-size: 18px">
                <time>ใช้วัสดุคุณภาพดี</time>
              </div>
              <p>เลือกใช้แต่วัสดุคุณภาพสูงในการผลิตเหล็กดัด และอบสีอย่างดี สีอบคุณภาพสูง
              </p>
            </div>
          </li>
          <li>
            <div class="content" style="background-color: #e7f3f5 !important;">
              <div style="text-align: center;font-weight: bold;color: black;font-size: 18px">
                <time>ประสบการณ์สูง</time>
              </div>
              <p>ทีมช่างมีความชำนาญ และประสบการณ์สูงในการผลิตและติดตั้ง
              </p>
            </div>
          </li>
          <li>
            <div class="content" style="background-color: #e7f3f5 !important;">
              <div style="text-align: center;font-weight: bold;color: black;font-size: 18px">
                <time>มีความรับผิดชอบ</time>
              </div>
              <p>ทำงานด้วยใจ และประสบการณ์ เปี่ยมด้วยความรับผิดชอบ ทั้งก่อนและหลังติดตั้ง</p>
            </div>
          </li>
        </ul>
      </section>      


      
    </div>                     
</div>
@endsection

@section('footer-js')

@endsection
