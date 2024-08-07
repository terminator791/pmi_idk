<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Status</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <link rel="icon" href="{{asset('images/logodiklat.jpg')}}">

    <!-- SweetAlert CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- unduh invoice -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2pdf.js@0.9.2/dist/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Assistant');

        body {
            background: #eee;
            font-family: Assistant, sans-serif;
        }

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
        }

        .card {
            margin-bottom: 1.5rem;
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            color: #000;
            background-clip: border-box;
            border: 1px solid #bb0000;
            border-radius: .25rem;
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card2 {
            margin-bottom: 1.5rem;
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            color: #000;
            background-clip: border-box;
            border: 1px solid #bb0000;
            border-radius: .25rem;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card.active {
            border: 2px solid #007bff;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
        }

        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: #e71d1d;
            color: #fff;
            border-bottom: 1px solid #e71d1d;
        }

        .status-card {
            border-color: transparent;
        }

        .status-card .card-header {
            background-color: #fff;
            color: #333;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .status-card.active .card-header {
            background-color: #ec0c0c;
            color: #fff;
        }

        .status-card-success .card-header {
            background-color: #9b9b9b;
            color: #fff;
        }

        .status-card-progress .card-header {
            background-color: #9b9b9b;
            color: #fff;
        }

        .status-card-failed .card-header {
            background-color: #9b9b9b;
            color: #fff;
        }

        @media print {
            .card-header {
                -webkit-print-color-adjust: exact;
            }

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

            .btn, .modal-header button {
                display: none !important;
            }
 
        }

        /* Custom CSS for table columns */
        .order-id-col {
            width: 15%;
            white-space: nowrap;
        }

        .actions-col {
            width: 20%;
            white-space: nowrap;
        }
        

        .btn-loading {
            pointer-events: none;
        }

        .btn-loading .spinner-border {
            display: inline-block;
        }

        .btn-loading .btn-text {
            display: none;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            font-size: 1rem;
            text-decoration: none;
            padding: 0.3rem 1rem;
            color: white;
            background-color: #e32121;
            border-radius: 0.25rem;
            transition: background-color 0.3s;
        }

        .btn-home:hover {
            background-color: #998e8e;
            text-decoration: none;
        }

        .btn-home i {
            margin-right: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Tombol Home -->
        <div class="mb-4">
            <a href="{{ url('/homeRegister') }}" class="btn-home btn-primary">
                <i class="fa fa-home"></i> Home
            </a>
        </div>
        <h2 class="text-center mb-4">CHECKOUT ORDERS</h2>

        <!-- Transaction Status Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card status-card status-card-success" data-status="success" onclick="filterBookings(this)">
                    <div class="card-header">
                        <i class="fa fa-check-circle"></i> Transaction Successful
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card status-card status-card-progress" data-status="pending" onclick="filterBookings(this)">
                    <div class="card-header">
                        <i class="fa fa-spinner"></i> Transaction In Progress
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card status-card status-card-failed" data-status="failed" onclick="filterBookings(this)">
                    <div class="card-header">
                        <i class="fa fa-times-circle"></i> Transaction Failed
                    </div>
                </div>
            </div>
        </div>

        <!-- Existing Table Code -->
        <div class="d-flex justify-content-center row mt-4">
            <div class="col-md-10">
                <div class="rounded">
                @if(is_array($bookings) && count($bookings) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered" id="bookingsTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="order-id-col">Order ID</th>
                                    <th>transaction date</th>
                                    <th class="actions-col">Total Price</th>
                                    <th>Payment Status</th>
                                    <th class="actions-col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $groupedBookings = collect($bookings)->groupBy('transaction_status');
                            @endphp

                            @foreach($groupedBookings as $status => $statusBookings)
                                @php $i = 1; @endphp
                                <div class="status-group" data-status="{{ $status }}">
                                    @forelse($statusBookings as $booking)
                                        <tr data-id="{{ $booking['id'] }}" data-status="{{ $booking['transaction_status'] }}">
                                            <td>{{ $i }}</td>
                                            <td class="order-id-col">{{ $booking['order_id'] }}</td>
                                            <td>{{ $booking['transaction_date'] }}</td>
                                            <td class="actions-col">Rp. {{ (int) $booking['total_price']}}</td>
                                            <td>
                                                @if($booking['transaction_status'] == 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($booking['transaction_status'] == 'success')
                                                    <span class="badge badge-success">Completed</span>
                                                @elseif($booking['transaction_status'] == 'failed')
                                                    <span class="badge badge-danger">Failed</span>
                                                @else
                                                    <span class="badge badge-secondary">Unknown</span>
                                                @endif
                                            </td>
                                            <td class="actions-col">
                                                @if($booking['transaction_status'] == 'pending')
                                                <button class="btn btn-sm btn-primary" onclick="payOrder({{ $booking['id'] }})">Pay</button>
                                                <button class="btn btn-sm btn-secondary" onclick="refreshOrder({{ $booking['id'] }})">Refresh</button>
                                                <button class="btn btn-sm btn-primary" onclick="showOrderDetails({{ $booking['id'] }})">Print</button>
                                                @endif
                                                @if($booking['transaction_status'] === 'success')
                                                <button class="btn btn-sm btn-primary" onclick="showOrderDetails({{ $booking['id'] }})">Print</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada pemesanan.</td>
                                        </tr>
                                    @endforelse
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center">Tidak ada pemesanan</p>
                @endif
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body" id="printableArea">
                <!-- Modal Content Here -->
                <div class="container-fluid">
                    <div class="card2">
                        <div class="card-header">Invoice
                            <strong id="orderID">#BBB-10010110101938</strong>
                            <!-- <button type="button" class="btn btn-sm btn-primary float-right mr-1 d-print-none" onclick="printModalContent()"><i class="fa fa-print"></i> Print</button> -->
                            <button type="button" class="btn btn-sm btn-primary float-right mr-1 d-print-none" id="downloadPdfButton" onclick="unduhModalContent()"><i class="fa fa-download"></i> Unduh PDF</button>
                            <button type="button" class="btn btn-sm btn-secondary float-right mr-1 d-print-none" id="downloadImageButton" onclick="unduhModalAsImage()"><i class="fa fa-download"></i> Unduh Gambar</button>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">From:</h6>
                                    <div><strong id="fromName"></strong></div>
                                    <div id="fromEmail"></div>
                                    <div id="fromPhone"></div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">To:</h6>
                                    <div><strong id="toName"></strong></div>
                                    <div id="toAddress"></div>
                                    <div id="toEmail"></div>
                                    <div id="toPhone"></div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Details:</h6>
                                    <div>Invoice <strong id="invoiceNumber"></strong></div>
                                    <div id="transactionDate"></div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Item</th>                               
                                            <th class="center">Quantity</th>
                                            <th class="right">Unit Cost</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orderItems">
                                        <!-- Order items will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                    <div class="content-container">
                                        <p id="paymentDeadline"></p>     
                                        <img src="{{ asset('assets_reservasi/hotel/Images/logodiklat2.jpg') }}" alt="Logo" width="300" height="80">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                    <tbody id="orderSummary">
                                        <tr>
                                            <td class="left"><strong>Subtotal</strong></td>
                                            <td class="right" id="subtotal"></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>VAT (5%)</strong></td>
                                            <td class="right" id="vat"></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right"><strong id="total"></strong></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <a class="btn btn-success" href="#" id="paymentLink"><i class="fa fa-usd"></i> Proceed to Payment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
    <script>
        function payOrder(orderId) {
            fetch(`http://127.0.0.1:8000/api/v1/user_transaction/getSnapToken?id=${orderId}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.snap_token) {
                    console.log('Snap token:', data.snap_token); // Log token Snap yang diterima
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            console.log('Payment success:', result);
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Transaksi Berhasil',
                                    text: 'Anda telah Menyelesaikan Transaksi.',
                                });
                            refreshOrder(orderId);
                        },
                        onPending: function(result) {
                            Swal.fire({
                                    icon: 'warning',
                                    title: 'Transaksi Menunggu',
                                    text: 'Selesaikan sebelum melebihi waktu yang ditentukan.',
                                });
                        },
                        onError: function(result) {
                            console.log('Payment error:', result);
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Transaksi Gagal',
                                    text: 'Transaksi Gagal.',
                                });
                            refreshOrder(orderId);
                        },
                        onClose: function() { 
                            Swal.fire({
                                    icon: 'warning',
                                    title: 'Transaksi Menunggu',
                                    text: 'Selesaikan sebelum melebihi waktu yang ditentukan.',
                                });      
                        }
                    });
                } else {
                    // Error Fetch data tidak ada / snap token tidak ada
                    console.error('Fetch berhasil tapi data tidak ada / snap token tidak ada');
                }
            })
            // Error Fetch data tidak ada
            .catch(error => {
                console.error('Error Fetch:', error);
            });
        }


        function refreshOrder(orderId) {
            const refreshButton = document.querySelector(`button[onclick="refreshOrder(${orderId})"]`);
            refreshButton.classList.add('btn-loading');
            refreshButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            fetch(`http://127.0.0.1:8000/api/v1/user_transaction/RefreshTransactionStatus?id=${orderId}`)
                .then(response => response.json())
                .then(data => {
                    const booking = data.booking;  // Akses response/data booking karena response berisi Booking

                    // Menemukan baris pada tabel yang sesuai dengan orderID untuk di refresh statusnya
                    const row = document.querySelector(`#bookingsTable tbody tr[data-id='${orderId}']`);
                    if (row) {      // Jika baris ketemu
                        const statusCell = row.querySelector('td:nth-child(5)');
                        statusCell.innerHTML = ''; // Menghapus badge yang ada
                        if (booking.transaction_status === 'pending') {
                            statusCell.innerHTML = '<span class="badge badge-warning">Pending</span>';      // Set Badge ke pending
                        } else if (booking.transaction_status === 'success') {
                            statusCell.innerHTML = '<span class="badge badge-success">Completed</span>';    // Set Badge ke Completed
                        } else if (booking.transaction_status === 'failed') {
                            statusCell.innerHTML = '<span class="badge badge-danger">Failed</span>';        // Set Badge ke Failed
                        } else {
                            statusCell.innerHTML = '<span class="badge badge-warning">Pending</span>';    // Set Badge ke default pending
                        }
                    } else {     // Jika baris tidak ketemu
                        console.error(`Row with ID ${orderId} not found.`);
                    }

                    // Kembalikan button dari loading setelah proses selesai
                    refreshButton.classList.remove('btn-loading');
                    refreshButton.innerHTML = '<span class="btn-text">Refresh</span>';
                })
                .catch(error => {       // Jika Data tidak ada / Fetch gagal
                    console.error('Data tidak ada / Fetch gagal:', error);
                    // Kembalikan button dari loading setelah proses selesai
                    refreshButton.classList.remove('btn-loading');
                    refreshButton.innerHTML = '<span class="btn-text">Refresh</span>';
                });
    }


        function showOrderDetails(orderId) {
            fetch(`http://127.0.0.1:8000/api/v1/user_transaction/getUserTransactionID?id=${orderId}`)
                .then(response => response.json())
                .then(data => {
                    const booking = data.booking;  // Access the booking object from the response

                    if (booking) {
                        // Populate modal with booking details
                        document.getElementById('orderID').innerText = booking.order_id;
                        document.getElementById('fromName').innerText = `Nama : ${booking.user.name}`;
                        document.getElementById('fromEmail').innerText = `Email: ${booking.user.email}`;
                        document.getElementById('fromPhone').innerText = `Phone: `;
                        document.getElementById('toName').innerText = "PUSDIKLAT PMI";
                        document.getElementById('toAddress').innerText = "Semarang, Jawa Tengah, 10394";
                        document.getElementById('toEmail').innerText = "Email: admin@admin.com";
                        document.getElementById('toPhone').innerText = "Phone: +62 8323456789";
                        document.getElementById('invoiceNumber').innerText = booking.order_id;
                        document.getElementById('transactionDate').innerText = new Date(booking.transaction_date).toLocaleDateString();

                        // Set payment deadline (dummy example)
                        document.getElementById('paymentDeadline').innerText = `Selesaikan Pembayaran Sebelum ${new Date(new Date(booking.transaction_date).getTime() + 7 * 24 * 60 * 60 * 1000).toLocaleDateString()} 12:00`;

                        // Update order items
                        const orderItems = document.getElementById('orderItems');
                        orderItems.innerHTML = ''; // Clear existing items
                        const items = booking.items || [
                            {
                                id: 1,
                                name: 'Kamar Standard',
                                quantity: 1,
                                unit_cost: booking.total_price,
                                total: booking.total_price
                            }
                        ];
                        items.forEach((item, index) => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td class="center">${index + 1}</td>
                                <td class="left">${item.name}</td>
                                <td class="center">${item.quantity}</td>
                                <td class="right">Rp${item.unit_cost.toLocaleString('id-ID')}</td>
                                <td class="right">Rp${item.total.toLocaleString('id-ID')}</td>
                            `;
                            orderItems.appendChild(row);
                        });

                        // Update summary
                        document.getElementById('subtotal').innerText = `Rp${(booking.total_price * 0.95).toLocaleString('id-ID')}`;
                        document.getElementById('vat').innerText = `Rp${(booking.total_price * 0.05).toLocaleString('id-ID')}`;
                        document.getElementById('total').innerText = `Rp${(booking.total_price).toLocaleString('id-ID')}`;

                        const paymentLinkbtn = document.getElementById('paymentLink');
                    
                        if (booking.transaction_status !== 'success') {
                            paymentLinkbtn.style.display = 'inline-block'; // Show payment button only if not success
                        
                        } else {
                            
                            paymentLinkbtn.style.display = 'none'; // Hide payment button if success
                        
                        }
                        
                        // Configure payment button
                        document.getElementById('paymentLink').addEventListener('click', function (e) {
                            e.preventDefault(); // Prevent default link behavior
                            snap.pay(booking.snap_token, {
                                onSuccess: function(result) {
                                    console.log('Payment success:', result);
                                    alert('Pembayaran berhasil!');
                                    refreshOrder(orderId);
                                },
                                onPending: function(result) {
                                    console.log('Payment pending:', result);
                                    alert('Pembayaran tertunda.');
                                    refreshOrder(orderId);
                                },
                                onError: function(result) {
                                    console.log('Payment error:', result);
                                    alert('Pembayaran gagal.');
                                },
                                onClose: function() {
                                    console.log('Payment popup closed');
                                }
                            });
                        });

                        $('#orderModal').modal('show');
                    } else {
                        console.error(`Booking with ID ${orderId} not found.`);
                    }
                })
                .catch(error => {
                    console.error('Error refreshing order:', error);
                });
            }

        function printModalContent() {
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        function filterBookings(card) {
            // Remove active class from all cards
            var cards = document.getElementsByClassName('status-card');
            for (var i = 0; i < cards.length; i++) {
                cards[i].classList.remove('active');
            }
            // Add active class to the clicked card
            card.classList.add('active');
            
            // Get the status from the clicked card
            var status = card.getAttribute('data-status');

            // Filter the table rows based on the selected status
            var rows = document.querySelectorAll('#bookingsTable tbody tr');
            rows.forEach(row => {
                if (status === 'All' || row.getAttribute('data-status') === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Set default active card to "Transaction In Progress"
        document.addEventListener('DOMContentLoaded', function() {
            var defaultCard = document.querySelector('.status-card-progress');
            if (defaultCard) {
                filterBookings(defaultCard);
            }
        });


        // Unduh invoice gambar
        function unduhModalAsImage() {
            const buttons = document.querySelectorAll('#printableArea .btn');
            const downloadImageButton = document.querySelector('#downloadImageButton'); 
            const downloadPdfButton = document.querySelector('#downloadPdfButton'); 
                
            if (downloadImageButton) downloadImageButton.style.display = 'none';
            if (downloadPdfButton) downloadPdfButton.style.display = 'none';
            const element = document.getElementById('printableArea');
            html2canvas(element).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.href = imgData;
                link.download = 'invoice.png';
                link.click();

                if (downloadImageButton) downloadImageButton.style.display = '';
                if (downloadPdfButton) downloadPdfButton.style.display = '';
                });
            }


            // Unduh invoice pdf
            function unduhModalContent() {
                const buttons = document.querySelectorAll('#printableArea .btn');
                const downloadImageButton = document.querySelector('#downloadImageButton'); 
                const downloadPdfButton = document.querySelector('#downloadPdfButton'); 
    
                if (downloadImageButton) downloadImageButton.style.display = 'none';
                if (downloadPdfButton) downloadPdfButton.style.display = 'none';
                
                const element = document.getElementById('printableArea');
                const opt = {
                    margin:       0.5,
                    filename:     'invoice.pdf',
                    image:        { type: 'jpeg', quality: 0.98 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
                
                html2pdf().from(element).set(opt).save().then(() => {
                    if (downloadImageButton) downloadImageButton.style.display = '';
                    if (downloadPdfButton) downloadPdfButton.style.display = '';
                }).catch(error => {
                    if (downloadImageButton) downloadImageButton.style.display = '';
                    if (downloadPdfButton) downloadPdfButton.style.display = '';
                });
            }

    </script>
</body>
</html>
