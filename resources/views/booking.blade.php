<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>

    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/shortcode/shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/responsive.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#txtCheckin").datepicker({
                minDate: 0,
                dateFormat: "dd-M-yy",
                onSelect: function (date) {
                    var date2 = $('#txtCheckin').datepicker('getDate');
                    date2.setDate(date2.getDate());
                    $('#txtCheckout').datepicker('setDate', date2);
                    $('#txtCheckout').datepicker('option', 'minDate', date2);
                }
            });
            $('#txtCheckout').datepicker({
                minDate: 0,
                dateFormat: "dd-M-yy",
                onClose: function () {
                    var dt1 = $('#txtCheckin').datepicker('getDate');
                    var dt2 = $('#txtCheckout').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#txtCheckout').datepicker('option', 'minDate');
                        $('#txtCheckout').datepicker('setDate', minDate);
                    }
                }
            });
        });
    </script>
</head>  
<body>
    <div class="wrapper">
        <div class="room-booking ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb-80 text-center">
                            <h2>Pemesanan <span>Kamar</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-rooms-tab">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#booking" data-toggle="tab"><span class="tab-border">1</span><span>Info Pemesanan</span></a></li>
                                <li><a href="#personal" data-toggle="tab"><span class="tab-border">2</span><span>Data Pribadi</span></a></li>
                            </ul>
                        </div>
                        <div class="service-tab-desc text-left mt-60">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="booking">
                                    <div class="booking-info-deatils">
                                        <div class="single-room-details fix">
                                            <div class="room-img">
                                                <img src="{{ asset('images/kamar/twin.jpg') }}" alt="Twin Room">
                                            </div>
                                            <div class="single-room-details pl-50">
                                                <h3 class="s_room_title">Twin Room</h3>
                                                <div class="room_price"><br>
                                                    <h4>Harga</h4><br>
                                                    <h5>Rp. 280000<span>/ malam</span></h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-room-booking-form mt-60">
                                            <div class="booking_form_inner">
                                                <form action="" method="post">
                                                    <div class="single-form-part">
                                                        <div class="date-to mb-20">
                                                            <input id="txtCheckin" value="Arrive date" readonly name="tgl_in">
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                        <div class="select-option">
                                                            <select name="jumlah">
                                                                <option selected>Jumlah Kamar</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="single-form-part">
                                                        <div class="date-to mb-20">
                                                            <input id="txtCheckout" value="Departure Date" name="tgl_out">
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                        <div class="select-option">
                                                            <input type="text" readonly name="jenis" value="Twin Room">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="personal">
                                    <div class="personal-info-details">
                                        <div class="booking-info-inner">
                                            <form action="" method="post">

                                                <div class="booking-form-list">
                                                    
                                                    <div class="single-form-part">
                                                        <div class="name mb-15">
                                                        </div>
                                                            <input type="text" placeholder="Nama Lengkap" value="iqbal" readonly name="nama">
                                                        </div>
                                                    </div>

                                                    <div class="single-form-part">
                                                        <div class="mail mb-15">
                                                            <input type="text" placeholder="Email" value="iqbal@mail.com" readonly name="email">
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                    </div>

                                                    <div class="single-form-part">
                                                        <div class="name mb-15">
                                                            <input type="tel" placeholder="No Telp." value="0892131312" readonly name="no">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="prve-next-box mt-20">
                                                    <div class="back-link">
                                                        <a href="#">Cancel</a>
                                                    </div>
                                                    <button type="submit">Pesan Sekarang</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <script src="{{ asset('assets_reservasi/js/bootstrap.min.js') }}"></script>
</body>
</html>
