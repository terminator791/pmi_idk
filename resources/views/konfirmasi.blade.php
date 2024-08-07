<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan</title>

    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/shortcode/shortcodes.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_reservasi/css/responsive.css')}}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    
    
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


<style>@import url('https://fonts.googleapis.com/css?family=Assistant');



.cell-1 {
  border-collapse: separate;
  border-spacing: 0 4em;
  background: #ffffff;
  border-bottom: 5px solid transparent;
  background-clip: padding-box;
  cursor: pointer;
}

thead {
  background: #dddcdc;
}

.table-elipse {
  cursor: pointer;
}

#demo {
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s 0.1s ease-in-out;
  transition: all 0.3s ease-in-out;
}

.row-child {
  background-color: #000;
  color: #fff;
}</style>

<style>
  .card {
    margin-bottom: 1.5rem;
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff; /* White background */
    color: #000; /* Black text for readability */
    background-clip: border-box;
    border: 2px solid #bb0000; /* Red border */
    border-radius: .1rem;
  } 

  .card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
  }

  .card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #e71d1d; /* Red background */
    color: #fff; /* White text for readability */
    border-bottom: 1px solid #e71d1d;
  }
</style>

<style>
    @media print {
  .card-header {
    -webkit-print-color-adjust: exact;
  }
}

  @media print {
    #printableArea, #printableArea * {
      visibility: visible;
    }
    #printableArea {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: auto;
      margin: 0;
      padding: 0;
    }
    .btn, .modal-header button { /* Hide all buttons and close icon */
      display: none !important;
    }
    
  }

  .status-failed {
    background-color: #f8d7da; /* Merah muda */
    color: #721c24; /* Merah gelap */
}

.status-pending {
    background-color: #fff3cd; /* Kuning muda */
    color: #856404; /* Kuning gelap */
}

.status-success {
    background-color: #d4edda; /* Hijau muda */
    color: #155724; /* Hijau gelap */
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
                                <li class="active"><a href="#done" data-toggle="tab"><span class="tab-border">1</span><span>Status Pemesanan</span></a></li>
                                <li><a href="#payment" data-toggle="tab"><span class="tab-border">2</span><span>Cetak Invoice</span></a></li>
                            </ul>
                        </div>
                        <div class="service-tab-desc text-left mt-60">
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="done">
                                    <div class="booking-done">
                                        <div class="booking-done-table table-responsive text-center" style="width: 100%;">
                                            <div class="text-right"><a href="{{ route('homeReg')}}" class="btn btn-primary">Kembali ke Beranda</a></div><br><br>
                                            @if (isset($booking['message']))
                                                <p>{{ $booking['message'] }}</p>
                                            @else
                                            <table class="table">
                            <thead>
                                <tr onclick="showOrderDetails()">
                                    <th class="text-center">S. No.</th>
                                    <th>Order #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th>Total</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th></th>
                                </tr>
                                <tbody class="table-body">
                                <tr class="cell-1" onclick="showOrderDetails('#SO-13489')">
                                    <td class="text-center">3</td>
                                    <td>#SO-13489</td>
                                    <td>Micro Steel</td>
                                    <td>Gasper Antunes</td>
                                    <td><span class="badge status-pending">Pending</span></td>
                                    <td>$2674.00</td>
                                    <td>March 20, 2020</td>
                                    <td>March 21, 2020</td>
                                    <td class="table-elipse"><i class="fa fa-ellipsis-h text-black-50"></i></td>
                                </tr>
                                <tr class="cell-1" onclick="showOrderDetails('#SO-13490')">
                                    <td class="text-center">4</td>
                                    <td>#SO-13490</td>
                                    <td>B Mobiles</td>
                                    <td>Gasper Antunes</td>
                                    <td><span class="badge status-failed">Failed</span></td>
                                    <td>$4674.00</td>
                                    <td>March 22, 2020</td>
                                    <td>March 23, 2020</td>
                                    <td class="table-elipse"><i class="fa fa-ellipsis-h text-black-50"></i></td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="payment">
                                    <div class="payment-info">
                                    <table class="table">
                            <thead>
                                <tr onclick="showOrderDetails()">
                                    <th class="text-center">S. No.</th>
                                    <th>Order #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th>Total</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th></th>
                                </tr>
                                <tbody class="table-body">
                                <tr class="cell-1" onclick="showOrderDetails('#SO-13487')">
                                    <td class="text-center">1</td>
                                    <td>#SO-13487</td>
                                    <td>Gasper Antunes</td>
                                    <td>Gasper Antunes</td>
                                    <td><span class="badge status-success">Success</span></td>
                                    <td>$2674.00</td>
                                    <td>March 20, 2020</td>
                                    <td>March 25, 2020</td>
                                    <td class="table-elipse"><i class="fa fa-ellipsis-h text-black-50"></i></td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
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


<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="printableArea">
                <!-- Modal Content Here -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Invoice <strong>#BBB-10010110101938</strong></span>
                            <button type="button" class="btn btn-sm btn-primary d-print-none" onclick="printModalContent()">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">From:</h6>
                                    <div><strong>Mohammad Iqbal</strong></div>
                                    <div>Plawangan, New York</div>
                                    <div>Email: admin@bbbootstrap.com</div>
                                    <div>Phone: +48 123 456 789</div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">To:</h6>
                                    <div><strong>PUSDIKLAT PMI</strong></div>
                                    <div>Semarang, Jawa Tengah, 10394</div>
                                    <div>Email: admin@bbbootstrap.com</div>
                                    <div>Phone: +48 123 456 789</div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb3">Details:</h6>
                                    <div>Invoice <strong>#BBB-10010110101938</strong></div>
                                    <div>April 30, 2019</div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th class="center">Quantity</th>
                                            <th class="right">Unit Cost</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">2</td>
                                            <td class="left">Samsung S6</td>
                                            <td class="left">Samsung S6 with extended warranty</td>
                                            <td class="center">20</td>
                                            <td class="right">$150.00</td>
                                            <td class="right">$3,000.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 col-sm-5">
                                    <p class="font-weight-bold">Selesaikan Pembayaran Sebelum 19/07/2024 12:00</p>
                                    <img src="{{ asset('assets_reservasi/hotel/Images/logodiklat2.jpg') }}" alt="Logo" width="300" height="80">
                                </div>
                                <div class="col-lg-4 col-sm-2 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left"><strong>Subtotal</strong></td>
                                                <td class="right">$8,497.00</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>VAT (10%)</strong></td>
                                                <td class="right">$679.76</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Total</strong></td>
                                                <td class="right"><strong>$7,477.36</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-success btn-block w-100 mt-3" href="#" data-abc="true">
                                        <i class="fa fa-usd"></i> Proceed to Payment
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
        function showOrderDetails() {
            $('#orderModal').modal('show');
        }

        function printModalContent() {
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        
    }
    </script>
    
    
</body>
</html>
    <script src="{{ asset('assets_reservasi/js/bootstrap.min.js')}}"></script>



