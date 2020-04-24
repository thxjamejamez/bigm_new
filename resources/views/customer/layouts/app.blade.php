<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{env('APP_NAME')}} - @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="/css/customer/layouts/linearicons.css">
    <link rel="stylesheet" href="/css/customer/layouts/font-awesome.min.css">
    <link rel="stylesheet" href="/css/customer/layouts/bootstrap.css">
    <link rel="stylesheet" href="/css/customer/layouts/magnific-popup.css">
    <link rel="stylesheet" href="/css/customer/layouts/customize.css">
    <link rel="stylesheet" href="/css/customer/layouts/nice-select.css">
    <link rel="stylesheet" href="/css/customer/layouts/animate.min.css">
    <link rel="stylesheet" href="/css/customer/layouts/owl.carousel.css">
    <link rel="stylesheet" href="/css/customer/layouts/main.css">

    {{-- start import css --}}
    @yield('header-css')
    {{-- end import css --}}
</head>

<body>
    <header id="header">
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="/">หน้าแรก</a></li>
                        <li><a href="about.html">เกี่ยวกับเรา</a></li>
                        <li><a href="services.html">สินค้า</a></li>
                        <li><a href="portfolio.html">ติดต่อ</a></li>
                        @auth
                        <li class="menu-has-children"><a href="">{{ \Auth::user()->name }}</a>
                            <ul>
                                <li>
                                    <a class="dropdown-item" href="{{ route('editprofile') }}">แก้ไขข้อมูลส่วนตัว</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        ออกจากระบบ
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth

                        @guest
                        <li><a href="register">สมัครสมาชิก</a></li>
                        <li><a href="login">เข้าสู่ระบบ</a></li>
                        @endguest
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->

    @if(isset($banner) && $banner)
    <!-- start banner Area -->
    <section class="relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{ collect($banner)->last()['name'] }}
                    </h1>
                    <p class="text-white link-nav">
                        @foreach ($banner as $key => $item)
                        <a href="{{ $item['path'] }}">{{ $item['name'] }}</a>
                        @if(!$key == count($banner) - 1)
                        <span class="lnr lnr-arrow-right"></span>
                        @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    @endif
    @yield('content')

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>About Me</h4>
                        <p>
                            We have tested a number of registry fix and clean utilities and present our top 3 list on
                            our site for
                            your convenience.
                        </p>
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made
                            with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>Stay updated with our latest trends</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="EMAIL"
                                        placeholder="Enter Email Address" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <span class="lnr lnr-arrow-right"></span>
                                        </button>
                                    </div>
                                    <div class="info"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                        <h4>Follow Me</h4>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="/js/customer/layouts/vendor/jquery-2.2.4.min.js"></script>
    <script src="/js/customer/layouts/popper.min.js"></script>
    <script src="/js/customer/layouts/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="/js/customer/layouts/easing.min.js"></script>
    <script src="/js/customer/layouts/hoverIntent.js"></script>
    <script src="/js/customer/layouts/superfish.min.js"></script>
    <script src="/js/customer/layouts/jquery.ajaxchimp.min.js"></script>
    <script src="/js/customer/layouts/jquery.magnific-popup.min.js"></script>
    <script src="/js/customer/layouts/jquery.tabs.min.js"></script>
    <script src="/js/customer/layouts/jquery.nice-select.min.js"></script>
    <script src="/js/customer/layouts/isotope.pkgd.min.js"></script>
    <script src="/js/customer/layouts/waypoints.min.js"></script>
    <script src="/js/customer/layouts/jquery.counterup.min.js"></script>
    <script src="/js/customer/layouts/simple-skillbar.js"></script>
    <script src="/js/customer/layouts/owl.carousel.min.js"></script>
    <script src="/js/customer/layouts/mail-script.js"></script>
    <script src="/js/customer/layouts/main.js"></script>
    <script src="/plugins/moment/moment-locale.js"></script>
    {{-- start import js --}}
    @yield('footer-js')
    {{-- end import js --}}
</body>

</html>