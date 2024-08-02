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
                dateFormat: "yy-mm-dd",
                onSelect: function (date) {
                    var date2 = $('#txtCheckin').datepicker('getDate');
                    date2.setDate(date2.getDate());
                    $('#txtCheckout').datepicker('setDate', date2);
                    $('#txtCheckout').datepicker('option', 'minDate', date2);
                }
            });
            $('#txtCheckout').datepicker({
                minDate: 0,
                dateFormat: "yy-mm-dd",
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
                                                <img src="{{ asset($room['room_images'][0]) }}" alt="Twin Room"> 
                                            </div>
                                            <div class="single-room-details pl-50">
                                                <h3 class="s_room_title">{{ $room['room_data']['room_type'] }}</h3>
                                                <div class="room_price"><br>
                                                    <h4>Harga</h4><br>
                                                    <h5>Rp. {{ (int) $room['room_data']['price'] }}<span>/ malam</span></h5>
                                                    <p>{{ $room['room_data']['description'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-room-booking-form mt-60">
                                            <div class="booking_form_inner">
                                                <form action="{{ route('bookings.store') }}" method="post">
                                                    @csrf
                                                    <div class="single-form-part">
                                                        <div class="date-to mb-20">
                                                            <input id="txtCheckin" name="start_date" placeholder="Arrive date" readonly>
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                        <div class="select-option">
                                                            <select name="amount">
                                                                <option selected>Jumlah Kamar</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="single-form-part">
                                                        <div class="date-to mb-20">
                                                            <input id="txtCheckout" name="end_date" placeholder="Departure Date" readonly>
                                                            <i class="mdi mdi-calendar-text"></i>
                                                        </div>
                                                        <div class="select-option">
                                                            <!-- Hidden input to send the room_type_id -->
                                                            <input type="hidden" name="room_type_id" value="{{ $room['room_data']['id'] }}">

                                                            <!-- Display the room_type to the user -->
                                                            <input type="text" readonly value="{{ $room['room_data']['room_type'] }}">
                                                        </div>
                                                    </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="personal">
                                    <div class="personal-info-details">
                                        <div class="booking-info-inner">
                                            
                                                <div class="booking-form-list">
                                                    <div class="single-form-part">
                                                        <input type="text" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}" name="name">
                                                    </div>
                                                    <div class="single-form-part">
                                                        <input type="text" placeholder="Email" value="{{ Auth::user()->email }}" readonly name="email">
                                                    </div>
                                                    <div class="single-form-part">
                                                        <input type="tel" placeholder="No Telp." value="{{ Auth::user()->phone }}" name="phone">
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