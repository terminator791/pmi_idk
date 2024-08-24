<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" />
    <style>
        body {
            margin: 0;
            line-height: normal;
        }
        .active {
            background-color: #8d0000; /* Warna latar belakang untuk card aktif */
            color: #fff; /* Warna teks untuk card aktif */
        }
        .inactive {
            background-color: #e5e5e5; /* Warna latar belakang untuk card tidak aktif */
            color: #000; /* Warna teks untuk card tidak aktif */
        }
        .nav-button {
            cursor: pointer;
            border-radius: 10px;
            border: 1px solid #858585;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 7px 15px;
            min-width: 96px;
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .card {
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .card.hidden {
            opacity: 0;
            transform: scale(0.95);
            display: none;
        }
        .card.visible {
            opacity: 1;
            transform: scale(1);
            display: block;
        }
        .status-success {
            background-color: #4caf50; /* Hijau untuk sukses */
            color: #fff;
        }
        .status-pending {
            background-color: #ffeb3b; /* Kuning untuk proses */
            color: #000;
        }
        .status-failed {
            background-color: #f44336; /* Merah untuk gagal */
            color: #fff;
        }
    </style>
</head>
<body>
  
    <section style="align-self: stretch; border-radius: 15px; background-color: #f7f3f3; display: flex; flex-direction: column; align-items: flex-end; justify-content: flex-start; padding: 36px 43px 69px 37px; box-sizing: border-box; gap: 276px; max-width: 100%; text-align: left; font-size: 20px; color: #272525; font-family: Poppins;">
        <div style="width: 1233px; height: 1040px; position: relative; border-radius: 15px; background-color: #f7f3f3; display: none; max-width: 100%;"></div>
        <div style="align-self: stretch; display: flex; flex-direction: column; align-items: flex-start; justify-content: flex-start; gap: 53px; max-width: 100%;">
            <div style="width: 647px; display: flex; flex-direction: row; align-items: flex-start; justify-content: flex-start; padding: 0px 1px; box-sizing: border-box; max-width: 100%;">
                <nav style="margin: 0; flex: 1; display: flex; flex-direction: row; align-items: flex-end; justify-content: flex-start; gap: 19px; max-width: 100%; white-space: nowrap; text-align: center; font-size: 16px; color: #000; font-family: Poppins;">
                    <div class="nav-button active" data-status="All" onclick="filterBookings(this)">
                        <a style="text-decoration: none; font-size: 16px; font-weight: 500; font-family: Poppins; color: inherit; text-align: left; display: inline-block; min-width: 115px;">Semua Status</a>
                    </div>
                    <div class="nav-button inactive" data-status="success" onclick="filterBookings(this)">
                        <a style="text-decoration: none; font-weight: 500; color: inherit;">Selesai</a>
                    </div>
                    <div class="nav-button inactive" data-status="pending" onclick="filterBookings(this)">
                        <a style="text-decoration: none; font-weight: 500; color: inherit;">Proses</a>
                    </div>
                    <div class="nav-button inactive" data-status="failed" onclick="filterBookings(this)">
                        <a style="text-decoration: none; font-weight: 500; color: inherit;">Failed</a>
                    </div>
                </nav>
            </div>
            <table id="bookingsTable" style="width: 100%; border-collapse: collapse;">
                <tbody>
                    @php
                        $groupedBookings = collect($bookings)->groupBy('transaction_status');
                    @endphp
                    @foreach($groupedBookings as $status => $statusBookings)
                        @forelse($statusBookings as $booking)
                            <tr data-status="{{ $status }}">
                                <td>
                                    <div class="card visible" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; background-color: #fff; padding: 14px 16px 20px; box-sizing: border-box; gap: 13.9px;">
                                        <div style="display: flex; flex-direction: row; align-items: flex-start; justify-content: space-between;">
                                            <div style="font-weight: 600;">Midle meeting room</div>
                                            <div style="font-size: 16px; color: #c7c7c7;">{{ $booking['transaction_date'] }}</div>
                                        </div>
                                        <img style="max-width: 100%; object-fit: contain; margin-top: -1px;" loading="lazy" alt="" src="./public/vector-181.svg"/>
                                        <div style="display: flex; flex-direction: row; align-items: flex-end; justify-content: space-between; font-size: 14px; color: #6a6a6a;">
                                            <div style="display: flex; flex-direction: row; gap: 26px;">
                                                <img style="height: 158px; width: 166px; border-radius: 10px; object-fit: cover;" loading="lazy" alt="" src="./public/rectangle-55@2x.png"/>
                                                <div style="flex: 1; display: flex; flex-direction: column; padding: 3px 0px 0px;">
                                                    <div>
                                                        <b>{{ $booking['order_id'] }}</b>
                                                        <div style="font-size: 12px; color: #000;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="border-radius: 5px; padding: 0px 12px 2px 15px; font-size: 13px;"
                                                 class="{{ $status == 'success' ? 'status-success' : ($status == 'pending' ? 'status-pending' : ($status == 'failed' ? 'status-failed' : '')) }}">
                                                {{ $status }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada pemesanan.</td>
                            </tr>
                        @endforelse
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="width: 459px; display: flex; flex-direction: row; align-items: flex-start; justify-content: center; max-width: 100%;">
            <img style="height: 41px; width: 39px;" loading="lazy" alt="" />
        </div>
    </section>

    <script>
        function filterBookings(card) {
            // Hapus kelas aktif dari semua card
            var cards = document.querySelectorAll('nav .nav-button');
            cards.forEach(function(c) {
                c.classList.remove('active');
                c.classList.add('inactive');
            });

            // Tambahkan kelas aktif ke card yang diklik
            card.classList.remove('inactive');
            card.classList.add('active');

            // Ambil status dari card yang diklik
            var status = card.getAttribute('data-status');

            // Filter baris tabel berdasarkan status yang dipilih
            var rows = document.querySelectorAll('#bookingsTable tbody tr');
            rows.forEach(function(row) {
                var cardDiv = row.querySelector('.card');
                if (status === 'All' || row.getAttribute('data-status') === status) {
                    cardDiv.classList.remove('hidden');
                    cardDiv.classList.add('visible');
                } else {
                    cardDiv.classList.remove('visible');
                    cardDiv.classList.add('hidden');
                }
            });
        }

        // Inisialisasi status default pada load
        document.addEventListener('DOMContentLoaded', function() {
            filterBookings(document.querySelector('nav .nav-button[data-status="All"]'));
        });
    </script>
</body>
</html>
