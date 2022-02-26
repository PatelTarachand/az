<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A2T Technical Services</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.webp">

    <!-- CSS
        ============================================ -->

   
    <link rel="stylesheet" href="{{ asset('public/web/assets/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/web/assets/css/plugins/plugins.min.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('public/web/assets/css/style.css') }}">

</head>

<body>


<div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <!--====================  header area ====================-->
    <div class="header-area header-area--default">

        <!-- Header Top Wrap Start -->
        <div class="header-top-bar-info bg-gray d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-bar-wrap">
                            <div class="top-bar-left">
                                <div class="top-bar-text">
                                 <a href="tel:+91 9755114809" class="info-link">
                                            <i class="info-icon fa fa-envelope"></i>
                                            <span class="info-text"><strong> +91 9755114809 </strong></span>
                                        </a>
                                </div>
                            </div>
                            <div class="top-bar-right">
                                <ul class="top-bar-info">
                                    <li class="info-item">
                                        <a href="tel:+91 9755114809" class="info-link">
                                            <i class="info-icon fa fa-phone"></i>
                                            <span class="info-text"><strong> +91 9755114809 </strong></span>
                                        </a>
                                    </li>
                                    <li class="info-item">
                                        <i class="info-icon fa fa-map-marker-alt"></i>
                                        <span class="info-text">Bajrang Chowk,Mathpurena,Raipur (C.G.) 492001</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top Wrap End -->

        <!-- Header Bottom Wrap Start -->
        <div class="header-bottom-wrap header-sticky">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header default-menu-style position-relative">

                            <!-- brand logo -->
                            <div class="header__logo">
                            <a href="{{ route('empHome') }}">
                                    <img src="{{ asset('public/web/a2ztech.png') }}" width="160" height="48" class="img-fluid" alt="A-Z Service">
                                </a>
                            </div>

                            <!-- header midle box  -->
                            <div class="header-midle-box">
                                <div class="header-bottom-wrap d-md-block d-none">
                                    <div class="header-bottom-inner">
                                        <div class="header-bottom-left-wrap">
                                            <!-- navigation menu -->
                                            <div class="header__navigation d-none d-xl-block">
                                                <nav class="navigation-menu primary--menu">
                                                <ul>
                                                    <li><a href="{{ route('empHome') }}"><span>Assign Service</span></a></li>
                                                    <li><a href="{{ route('serviceManProfile') }}"><span>Profile</span></a></li>
                                                    <li><a href="{{ route('serviceManLogout') }}"><span>Logout</span></a></li>
                                                </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- header right box -->
                            <div class="header-right-box">
                                <div class="header-right-inner" id="hidden-icon-wrapper">
                                
                                </div>

                                <!-- mobile menu -->
                                <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                                <!-- hidden icons menu -->
                                <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                                    <a href="javascript:void(0)">
                                        <i class="far fa-ellipsis-h-alt"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom Wrap End -->



    @yield('content')
 <!--====================  scroll top ====================-->
 <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fal fa-long-arrow-up"></i>
        <i class="arrow-bottom fal fa-long-arrow-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->
    <!-- Start Toolbar -->

    <!-- End Toolbar -->

    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/images/logo/logo-dark.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-end">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                <ul>
                                                    <li><a href="{{ route('empHome') }}"><span>Assign Service</span></a></li>
                                                    <li><a href="{{ route('serviceManProfile') }}"><span>Profile</span></a></li>
                                                    <li><a href="{{ route('serviceManLogout') }}"><span>Logout</span></a></li>
                                                </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->







    <!--====================  search overlay ====================-->
    <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 ms-auto col-4">
                        <!-- search content -->
                        <div class="search-content text-end">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <form action="#">
                        <input type="text" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of search overlay  ====================-->

     <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('public/web/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- jQuery JS -->
    <script src="{{ asset('public/web/assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('public/web/assets/js/vendor/bootstrap.min.js') }}"></script>

   
    <script src="{{ asset('public/web/assets/js/plugins/plugins.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('public/web/assets/js/main.js') }}"></script>


</body>


</html>
