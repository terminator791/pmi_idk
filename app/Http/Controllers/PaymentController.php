<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    //
    public function index()
{
    try {
        $user_email = Session('response')['email'];

        $response = Http::get('http://127.0.0.1:8000/api/v1/user_transaction/getUserTransaction', [
            'user_email' => $user_email
        ]);

        // dd($response->json());

        // Initialize bookings as an empty array
        $bookings = [];
        if ($response->successful()) {
            $bookings = $response->json();
            // if (!empty($bookingsData['booking'])) {
            //     foreach ($bookingsData['booking'] as $booking) {
            //         $booking['start_date'] = Carbon::parse($booking['start_date'])->format('d F Y');
            //         $booking['end_date'] = Carbon::parse($booking['end_date'])->format('d F Y');
            //         $bookings[] = $booking;
            //     }
            // } else {
            //     $bookings[] = ['message' => 'Tidak ada pemesanan'];
            // }
        } elseif ($response->status() == 403) {
            return redirect()->route('login')->withErrors(['error' => 'Your email address is not verified.']);
        } else {
           
        }

        

        return view('checkout', ['bookings' => $bookings]);

    } catch (\Throwable $th) {
        return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
    }
}


    // public function index2(){
    //     $user_email = Session('response')['email'];
    //     $response = Http::get('http://127.0.0.1:8000/api/getBookings', [
    //         'user_email' => $user_email
    //     ]);
    //     $bookings = $response->json();
    //     $bookings['booking']['start_date'] = Carbon::parse($bookings['booking']['start_date'])->format('d F Y');
    //     $bookings['booking']['end_date'] = Carbon::parse($bookings['booking']['end_date'])->format('d F Y');
        
    //     return view('konfirmasi2', ['booking' => $bookings['booking']]);
    // }
    
}
