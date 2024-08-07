<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PUSDIKLAT PMI</title>
  <!-- TAMBAHANKU -->
  
  <!-- END TAMBAHANKU -->
  <link rel="stylesheet" href="{{  asset('assets_reservasi/hotel/css/style.css')}}">
  <link rel="icon" href="{{  asset('images/logo_asli2.ico')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>

<header>
    <!-- <li> <i class="fa fa-search"></i> </li> -->
    @if(session()->has('access_token'))
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="content flex_space">
            <div class="logo">
                <img src="{{ asset('assets_reservasi/hotel/Images/logodiklat2.jpg')}}" alt="">
            </div>
            <div class="navlinks">
                <ul id="menulist">
                    <li><a href="#home">home</a> </li>
                    <li><a href="#about">about</a> </li>
                    <li><a href="#rooms">Rooms</a> </li>
                    <li><a href="#hall">Meeting Rooms</a> </li>
                    <li><a href="#service">service</a> </li>
                    <li><a href="#contact">contact</a> </li>
                    <a>
                        <button type="submit" class="primary-btn">LOGOUT</button>
                    </a>
                </ul>
            </div>
        </div>
    </form>
    @else
    <div class="content flex_space">
        <div class="logo">
            <img src="{{ asset('assets_reservasi/hotel/Images/logodiklat2.jpg')}}" alt="">
        </div>
        <div class="navlinks">
            <ul id="menulist">
                <li><a href="#home">home</a> </li>
                <li><a href="#about">about</a> </li>
                <li><a href="#rooms">Rooms</a> </li>
                <li><a href="#hall">Meeting Rooms</a> </li>
                <li><a href="#service">service</a> </li>
                <li><a href="#contact">contact</a> </li>
                <a href="{{ route('login') }}">
                    <button class="primary-btn">LOGIN</button>
                </a>
            </ul>
        </div>
    </div>
    @endif
</header>

  <script>
    var menulist = document.getElementById('menulist');
    menulist.style.maxHeight = "0px";

    function menutoggle() {
      if (menulist.style.maxHeight == "0px") {
        menulist.style.maxHeight = "100vh";
      } else {
        menulist.style.maxHeight = "0px";
      }
    }
  </script>


  <section class="home" id="home">
    <div class="content">
      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="{{asset('assets_reservasi/hotel/images/banner1.png')}}" alt="">
          <div class="text">
            <h1>Pusdiklat PMI Provinsi Jawa Tengah</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            <div class="flex">
              <a href="{{ route('homeReg') }}">
              <button href="{{route('homeReg')}}" class="primary-btn">BOOK NOW</button> </a>
              <button class="secondary-btn">CONTACT US</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="{{asset('assets_reservasi/hotel/images/banner-2.png')}}" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            <div class="flex">
              <button class="primary-btn">BOOK NOW</button>
              <button class="secondary-btn">CONTACT US</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="{{asset('assets_reservasi/hotel/images/banner-3.png')}}" alt="">
          <div class="text">
            <h1>Spend Your Holiday</h1>
            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
            </p>
            <div class="flex">
              <button class="primary-btn">BOOK NOW</button>
              <button class="secondary-btn">CONTACT US</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  </script>




  <section class="book" id="book">
    <div class="container flex_space">
      <div class="text">
        <h1> <span>Book </span> Your Rooms </h1>
      </div>
      <div class="form">
        <form class="grid">
          <input type="date" placeholder="Araival Date">
          <input type="date" placeholder="Departure Date">
          <input type="number" placeholder="Adults">
          <input type="number" placeholder="Childern">
          <button class="primary-btn">CHECK ROOM</button></a>
        </form>
      </div>
    </div>
  </section>


  <section class="about top" id="about">
    <div class="container flex">
      <div class="left">
        <div class="heading">
          <h1>WELCOME</h1>
          <h2>Pusdiklat PMI Jateng</h2>
        </div>
        <p>GEDUNG DIKLAT PMI PROVINSI JAWA TENGAH Terletak di kawasan perbukitan di Kota Semarang yang memiliki suasana nyaman dan jauh dari kebisingan kota, sehingga cocok digunakan untuk tempat rapat pendidikan, pelatihan, seminar dan lainnya. 
            lingkungan Gedung Diklat yang Hijau dan ramah untuk belajar 
            memiliki beragam fasilitas yang tersedia serta pilihan menu hidangan yang ditawarkan bervariasi sehat dan lezat.  
        </p>
        <button class="primary-btn">ABOUT US</button>
      </div>
        <div class="right">
      <a href="#"><img src="{{ asset('images/pengguna/diklat.jpg') }}"  alt=""></a>
      </div>
    </div>
  </section>
  

  <section class="counter top">
    <div class="container grid">
      <div class="box">
        <h1>2500</h1>
        <hr>
        <span>Customer</span>
      </div>
      <div class="box">
        <h1>1250</h1>
        <hr>
        <span>Happy Customer</span>
      </div>
      <div class="box">
        <h1>150</h1>
        <hr>
        <span>Expert Technicians</span>
      </div>
      <div class="box">
        <h1>3550</h1>
        <hr>
        <span>Desktop Reaired</span>
      </div>
    </div>
  </section>

  <section class="rooms"  id="rooms">
    <div class="container top">
      <div class="heading">
        <h1>EXPLORE</h1>
        <h2>Our Rooms</h2>
        <p>Nikmati pengalaman menginap yang luar biasa di Kamar kami, yang dirancang dengan gaya modern dan menyediakan ruang yang luas seluas 30 meter persegi. Setiap kamar dilengkapi dengan jendela panjang untuk menikmati pemandangan di Kota Semarang atas yang menakjubkan. Seperangkat fasilitas dalam kamar juga tersedia di kamar ini untuk kenyamanan menginap.
        </p>
      </div>
      <div class="content mtop">
        <div class="owl-carousel owl-carousel1 owl-theme">
          @foreach ($rooms as $room )

          <div class="items">
            <div class="image">
            <img src="{{ asset( $room['image'] ) }}" alt="">
            </div>
            <div class="text">
              <h2>{{ str_replace('_', ' ', $room['room_type']) }}</h2>
              <div class="rate flex">
                <i class="fa fa-wifi"></i>
                <i class="fa fa-television"></i>
                <i class="fa fa-cutlery"></i>
               
              </div>
              <p>{{ $room['description'] }}</p>
              <div class="button flex">
                
                <a href="{{ route('room.details', ['id' => $room['id']]) }}">
                  <button class="primary-btn">Pesan</button>
                </a>

                <h3>Rp.{{ (int) $room['price'] }}<span> <br> Per Malam </span> </h3>

              </div>
            </div>
          </div>
          
          @endforeach
         
        </div>
      </div>
    </div>
    </div>
  </section>
  
  <script>
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 40,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2,
          margin: 10,
        },
        1000: {
          items: 3
        }
      }
    })
  </script>



<section class="hall"  id="hall">
  <div class="container top">
    <div class="heading">
      <h1>EXPLORE</h1>
      <h2>Our Meeting Rooms</h2>
      <p>Ruang rapat juga tersedia di tempat kami. Ruang rapat dan ruang acara kami nyaman, praktis, dan dilengkapi dengan baik. Berbagai fasilitas dan layanan meliputi proyektor, layar, dan koneksi internet yang kuat dan stabil. Semua ini tersedia di tempat kami yang modern dan bergaya. Anda dapat yakin bahwa kami akan memenuhi setiap kebutuhan rapat Anda.
      </p>
    </div>

      <div class="content mtop">
        <div class="owl-carousel owl-carousel3 owl-theme">
      
        @foreach ($meetingRooms as $meetingRoom )

<div class="items">
  <div class="image">
  <img src="{{ asset( $meetingRoom['image'] ) }}" alt="">
  </div>
  <div class="text">
    <h2>{{ str_replace('_', ' ', $meetingRoom['room_type']) }}</h2>
    <div class="rate flex">
      <i class="fa fa-wifi"></i>
      <i class="fa fa-television"></i>
      <i class="fa fa-cutlery"></i>
     
    </div>
    <p>{{ $meetingRoom['description'] }}</p>
    <div class="button flex">
      
      <a href="{{ route('room.details', ['id' => $meetingRoom['id']]) }}">
        <button class="primary-btn">Pesan</button>
      </a>

      <h3>Rp.{{ (int) $meetingRoom['price'] }}<span> <br> Per Malam </span> </h3>

    </div>
  </div>
</div>

@endforeach
         
        
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('.owl-carousel3').owlCarousel({
      loop: true,
      margin: 40,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2,
          margin: 10,
        },
        1000: {
          items: 3
        }
      }
    })
  </script>


  <section class="gallery" id="gallery">
    <div class="container top">
      <div class="heading">
        <h1>PHOTOS</h1>
        <h2>Our Gallery</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
      </div>
    </div>

    <div class="content mtop">
      <div class="owl-carousel owl-carousel1 owl-theme">
      
        <div class="items">
          <div class="img">
             <a href="#"><img src="{{ asset('images/galery/galery1.jpg') }}" alt=""></a>
          </div>
          <div class="overlay">
            <h3>Loby</h3>
          </div>
        </div>


      </div>
    </div>
  </section>


  <script>
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplayHoverPause: true,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 4,
        },
        1000: {
          items: 6
        }
      }
    })
  </script>


  <section class="services top" id="service">
    <div class="container">
      <div class="heading">
        <h1>SERVICES</h1>
        <h2>Our Services</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
      </div>


      <div class="content flex_space">
        <div class="left grid2">
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-champagne-glasses"></i>
              <h3>Delious Food</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-person-biking"></i>
              <h3>Fintness</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-utensils"></i>
              <h3>Inhouse Restaurant</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-spa"></i>
              <h3>Beauty Spa</h3>
            </div>
          </div>
        </div>
        <div class="right">
          <img src="{{asset('assets_reservasi/hotel/images/service.png')}}" alt="">
        </div>
      </div>
    </div>
  </section>




  <section class="Customer top" id="customer">
    <div class="container">
      <div class="owl-carousel owl-carousel2 owl-theme">
        <div class="item">
            <i class="fa-solid"><img class="img"  src="{{asset('images/testimoni/testi1.jpg')}}" alt=""></i>
            <p>Meginap di  Pusdiklat sangatlah nyaman, teanng  dan udarany masih sejuk</p>
            <h3>Salsa</h3>
            <label>PT. Maju Terus></label>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('.owl-carousel2').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1,
        },
        1000: {
          items: 1
        }
      }
    })
  </script>

<section class="map mt-5" id="contact">
<iframe style="border:0; width: 100%; height: 350px;"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.819846329442!2d110.45263287509174!3d-7.030450268878298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c41455b4095%3A0x8782323957259bc7!2sPusdiklat%20Palang%20Merah%20Indonesia%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1718685023607!5m2!1sid!2sid" frameborder="0" allowfullscree></iframe>
  </section>


  <!-- <section class="news top rooms" id="news">
    <div class="container">
      <div class="heading">
        <h1>NEWS</h1>
        <h2>Our News</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
      </div>


      <div class="content flex">
        <div class="left grid2">
          <div class="items">
            <div class="image">
              <img src="assets/hotel/images/blog-1.png" alt="">
            </div>
            <div class="text">
              <h2>Finibus bonorum malorm.</h2>
              <div class="admin flex">
                <i class="fa fa-user"></i>
                <label>Admin</label>
                <i class="fa fa-heart"></i>
                <label>500</label>
                <i class="fa fa-comments"></i>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/hotel/images/blog-2.png" alt="">
            </div>
            <div class="text">
              <h2>Finibus bonorum malorm.</h2>
              <div class="admin flex">
                <i class="fa fa-user"></i>
                <label>Admin</label>
                <i class="fa fa-heart"></i>
                <label>500</label>
                <i class="fa fa-comments"></i>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>

        <div class="right">
          <div class="box flex">
            <div class="img">
              <img src="assets/hotel/images/blog-s1.png" alt="">
            </div>
            <div class="stext">
              <h2>Etiam Vel Nequ</h2>
              <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
              </p>
            </div>
          </div>
          <div class="box flex">
            <div class="img">
              <img src="assets/hotel/images/blog-s2.png" alt="">
            </div>
            <div class="stext">
              <h2>Etiam Vel Nequ</h2>
              <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
              </p>
            </div>
          </div>
          <div class="box flex">
            <div class="img">
              <img src="assets/hotel/images/blog-s3.png" alt="">
            </div>
            <div class="stext">
              <h2>Etiam Vel Nequ</h2>
              <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  -->


  <!-- <section class="newsletter mtop">
    <div class="container flex_space">
      <h1>Subscribe to Our Newsletter</h1>
      <input type="text" placeholder="Your Email">
      <input type="text" value="Subscribe">
    </div>
  </section> -->

  <footer>
    <div class="container grid">
      <div class="box">
      <div class="logo">
        
        <img src="{{ asset('assets_reservasi/hotel/Images/logodiklat2.jpg')}}" width: 100%; height: 350px; alt="">
      </div>
        <p>  GEDUNG DIKLAT PMI PROVINSI JAWA TENGAH Terletak di kawasan perbukitan di Kota Semarang yang memiliki suasana nyaman dan jauh dari kebisingan kota, sehingga cocok digunakan untuk tempat rapat pendidikan, pelatihan, seminar dan lainnya. 
lingkungan Gedung Diklat yang Hijau dan ramah untuk belajar 
memiliki beragam fasilitas yang tersedia serta pilihan menu hidangan yang ditawarkan bervariasi sehat dan lezat.  </p>
  
        <div class="icon">
          <i class="fa fa-facebook-f"></i>
          <i class="fa fa-instagram"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-youtube"></i>
        </div>
      </div>

      <div class="box">
        
      </div>

      <div class="box">
        <h2>Hubungi Kami</h2>
        <p>Pusdiklat PMI Provinsi Jawa Tengah
        </p>
        <i class="fa fa-location-dot"></i>
        <label>Jl. Arumsari Rt. 11 Rw. 02 Sambiroto, Semarang </label> <br>
        <i class="fa fa-phone"></i>
        <label>+6224 7674 6702</label> <br>
        <i class="fa fa-envelope"></i>
        <label>diklat_jateng@pmi.or.id</label> <br>
      </div>
    </div>
  </footer>

  <div class="legal">
    <p class="container">Copyright (c) 2024 Copyright Holder All Rights Rephpserved.</p>
  </div>



  <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  @if ($errors->any())
    <script>
        Toastify({
            text: {!! json_encode($errors->all()) !!},
            duration: 2000,
            position: 'right',
            backgroundColor: 'red'
        }).showToast();
    </script>
    @endif

    @if (session('message'))
        <script>
            Toastify({
                text: "{{ session('message') }}",
                duration: 2000,
                position: 'right',
                backgroundColor: 'green'
            }).showToast();
        </script>
    @endif 
</body>

</html>