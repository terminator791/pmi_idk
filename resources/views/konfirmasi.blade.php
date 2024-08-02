<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan</title>

    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/shortcode/shortcodes.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/responsive.css')}}">
    <link rel="icon" href="{{asset('images/logodiklat.jpg')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script language="javascript">
         $(document).ready(function () {
            $("#txtCheckin").datepicker({
                minDate:0,
                dateFormat: "dd-M-yy",
                onSelect: function (date) {
                    var date2 = $('#txtCheckin').datepicker('getDate');
                    date2.setDate(date2.getDate());
                    $('#txtCheckout').datepicker('setDate', date2);
                    //sets minDate to dateofbirth date + 1
                    $('#txtCheckout').datepicker('option', 'minDate', date2);
                }
            });
            $('#txtCheckout').datepicker({
                minDate:0,
                dateFormat: "dd-M-yy",
                onClose: function () {
                    var dt1 = $('#txtCheckin').datepicker('getDate');
                    console.log(dt1);
                    var dt2 = $('#txtCheckout').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#txtCheckout').datepicker('option', 'minDate');
                        $('#txtCheckout').datepicker('setDate', minDate);
                    }
                }
            });
        });

    </script>

<style>
        .table {
            border-collapse: separate;
            border-spacing: 0 15px;
            width: 100%;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .btn-primary {
            margin-bottom: 15px;
        }
    </style>
</head>  
<body>
    <div class="wrapper">

          <div class="room-booking ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="section-title mb-80 text-center">
                            <h2>Konfirmasi <span>Pemesanan</span></h2>
                            
                            <div class="toast">
                                <div class="toast-body">
                                   <p>message flash ??</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-rooms-tab">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#done" data-toggle="tab"><span class="tab-border">1</span><span>Konfirmasi</span></a></li>
                                <li><a href="#payment" data-toggle="tab"><span class="tab-border">2</span><span>Status Pemesanan</span></a></li>
                            </ul>
                        </div>
                        <div class="service-tab-desc text-left mt-60">
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="done">
                                    <div class="booking-done">
                                        <div class="booking-done-table table-responsive text-center" style="width: 100%;">
                                            <div class="text-right"><a href="{{ route('homeReg')}}" class="btn btn-primary">Kembali ke Beranda</a></div><br><br>
                                            <table class="table">
                                                <tr>
                                                    <td><p>Tanggal <span>{{ $booking['start_date'] }} - {{ $booking['end_date'] }}</span></p></td>
                                                    <td><p> Nama <span></span></p></td>
                                                    <td><p>Email<span></span></p></td>
                                                    <td><p>Harga</p></td>
                                                </tr>
                                               
                                                    <tr class="row2">
                                                        <td><p>Twin Room <span>Jumlah : 2</span></p></td>
                                                        <td><p>{{ $booking['user']['name'] }}</p></td>
                                                        <td><p>{{ $booking['user_email'] }}<span></span></p></td>
                                                        <td><p>{{ (int) $booking['room']['room_type']['price'] }}</p></td>
                                                    </tr>
                                                
                                                <tr class="row3">
                                                    <td><p>Total</p></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><p> {{ (int)$booking['total_price'] }}</p></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="payment">
                                    <div class="payment-info">
                                        <h1>Status Pemesanan Anda</h1>
                                        <h3>"Menunggu Pembayaran...."</h3>
                                    </div>        
                                </div>

                                <div role="tabpanel" class="tab-pane" id="tiket">
                                    <div class="payment-info">
                                        <h1>TIKET</h1>
                                        <h3>DISINI</h3>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
</div>
    
</body>
</html>
<!-- <script src="{{ asset('assets_reservasi/js/vendor/jquery-1.12.0.min.js')}}"></script> -->
    
    <script src="{{ asset('assets_reservasi/js/bootstrap.min.js')}}"></script>
   
   <!--  <script src="{{ asset('assets_reservasi/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/video-player.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/animated-headlines.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/mailchimp.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/ajax-mail.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/parallax.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/textilate.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/lettering.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/packery-mode.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/plugins.js')}}"></script>
    <script src="{{ asset('assets_reservasi/js/main.js')}}"></script> -->