<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Selamat Datang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/shortcode/shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/responsive.css') }}">

    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <script src="{{ asset('assets_reservasi/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <style type="text/css">
        .header-section {
            background: url('{{ asset('assets_reservasi/images/1.jpg') }}') no-repeat scroll center center;
            background-size: cover;
            background-attachment: fixed;
        }

        .header-section.height-vh {
            height: 100vh;
        }

        .header-section, .menu .search-bar, .b-date, .select-book {
            position: relative
        }

        .footer {
            background: url('{{ asset('assets_reservasi/images/back.jpg') }}') no-repeat scroll center center;
            background-size: cover;
            background-attachment: fixed;
        }

        .footer-bg-opacity {
            background: rgba(0, 0, 0, 0.8) none repeat scroll 0 0;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="loading-center">
            <div class="loading-center-absolute">
                <div class="object object_one"></div>
                <div class="object object_two"></div>
                <div class="object object_three"></div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <!--Header section start-->
        <div class="header-section">
            <div class="bg-opacity"></div>
            <div class="top-header sticky-header">
                <div class="top-header-inner">
                    <div class="container">
                        <div class="mgea-full-width">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <div class="logo mt-15">
                                        <a href="index.html"><img src="{{ asset('images/logodiklat.jpg') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-10 hidden-xs">
                                    <div class="header-top ptb-10"></div>
                                    <div class="menu mt-25">
                                        <div class="menu-list hidden-sm hidden-xs">
                                            <nav>
                                                <ul style="text-align: right;">
                                                    <li><a href="#">Home</a></li>
                                                    <!-- <li><a href="{{ Route('booking')}}">Your Bookings</a></li> -->
                                                    <li><a href="{{ Route('konfirmasi')}}">Konfirmasi Pemesanan</a></li>
                                                    <li><a href="#">Logout</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile menu start -->
                <div class="mobile-menu-area hidden-lg hidden-md">
                    <div class="container">
                        <div class="col-md-12">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Konfirmasi Pemesanan</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Mobile menu end -->
            </div>
            <!--Welcome section-->
            <div class="welcome-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="booking-box">
                                <div class="booking-title">
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                                <div class="booking-form">
                                    <br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-7">
                            <div class="welcome-text">
                                <p style="color: #fff; font-size: 18px;">Halo <b style="color: #fff; font-size: 16px; font-weight: bold;">Iqbal</b></p>
                                <h2>
                                    <span>SELAMAT DATANG DI</span> <span class="coloring">PUSDIKLAT PMI JATENG</span>
                                </h2>
                                <h1 class="cd-headline clip">
                                    <span>KEUNGGULAN</span>
                                    <span class="cd-words-wrapper coloring">
                                        <b class="is-visible"> LOKASI</b>
                                        <b>KAMAR</b>
                                        <b>FASILITAS</b>
                                    </span>
                                </h1>
                                <p class="welcome-desc">Kami menyediakan tempat yang baik, lokasi yang strategis, ruangan yang nyaman, dan pelayanan prima <br>Sehingga pelanggan tidak merasa kapok setelah datang kesini</p>
                                <div class="explore">
                                    <a href="#">PENASARAN?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header section end -->
        <!-- searchbar Start -->
        <div class="search-bar animated slideOutUp">
            <div class="table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="search-form-wrap">
                                    <button class="close-search"><i class="mdi mdi-close"></i></button>
                                    <form action="#">
                                        <input type="text" placeholder="Search here..." value="Search here..." />
                                        <button class="search-button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search bar End -->
        <!-- About Section Title start -->
        <div class="about-section text-center ptb-80 white_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-chondo">
                            <div class="section-title mb-75">
                                <h2>Jenis <span>MEETING Rooms</span></h2>
                                <p>Kami menyediakan berbagai jenis meeting rooms, sesuai kebutuhan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="our-room-show">
                    <div class="row">
                        <div class="carousel-list">
                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a>Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a href="#"><img src="{{ asset('images/kamar/hall2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Midle Meeting Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp. 280000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more room entries here as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section end -->
        <!-- Our Room start -->
        <div class="our-room text-center ptb-80 white-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb-75">
                            <h2>Jenis <span>Kamar</span></h2>
                            <p>Kami menyediakan berbagai jenis kamar, baik untuk sendiri, pasangan, maupun keluarga</p>
                        </div>
                    </div>
                </div>
                <div class="our-room-show">
                    <div class="row">
                        <div class="carousel-list">
                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-img">
                                        <a ><img src="{{ asset('images/kamar/twin.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">Twin Room</a></h3>
                                        </div>
                                        <div class="room-rent">
                                            <h6>Rp 190000 / <label>Malam</label></h6>
                                        </div>
                                        <div class="room-book">
                                            <a href="{{ route('booking') }}">Pesan</a>
                                        </div>
                                    </div>

                                    
                                </div>
                                

                                

                                
                            </div>
                            <!-- Add more room entries here as needed -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Room end -->
        <!-- Footer start -->
        <div class="footer ptb-100">
            <div class="footer-bg-opacity"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="single-footer mt-0">
                            <div class="logo">
                                <img src="{{ asset('images/logodiklat.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm col-xs-6">
                        <div class="single-footer">
                            <h3>Fasilitas</h3>
                            <div class="quick-item">
                                <ul>
                                    <li><a href="#">Kamar</a></li>
                                    <li><a href="#">Makan & Minum</a></li>
                                    <li><a href="#">Kolam Renang</a></li>
                                    <li><a href="#">Gym</a></li>
                                    <li><a href="#">Karaoke</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Add more footer sections as needed -->
                </div>
            </div>
        </div>
        <div class="copyright ptb-20 white_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <p>Copyright© Created by <a href="https://freethemescloud.com/">PMI Jateng</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer end -->
    </div>

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="{{ asset('assets_reservasi/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/video-player.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/animated-headlines.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/mailchimp.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/parallax.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/textilate.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/lettering.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/packery-mode.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/plugins.js') }}"></script>
    <script src="{{ asset('assets_reservasi/js/main.js') }}"></script>
</body>

</html>
