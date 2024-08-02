<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    //
    public function index(){
        $user_email = Auth::user()->email;
        $response = Http::get('http://127.0.0.1:8000/api/getBookings', [
            'user_email' => $user_email
        ]);
        $bookings = $response->json();
        $bookings['booking']['start_date'] = Carbon::parse($bookings['booking']['start_date'])->format('d F Y');
        $bookings['booking']['end_date'] = Carbon::parse($bookings['booking']['end_date'])->format('d F Y');
        
        return view('konfirmasi', ['booking' => $bookings['booking']]);
    }

    public function index2(){
        $user_email = Auth::user()->email;
        $response = Http::get('http://127.0.0.1:8000/api/getBookings', [
            'user_email' => $user_email
        ]);
        $bookings = $response->json();
        $bookings['booking']['start_date'] = Carbon::parse($bookings['booking']['start_date'])->format('d F Y');
        $bookings['booking']['end_date'] = Carbon::parse($bookings['booking']['end_date'])->format('d F Y');
        
        return view('konfirmasi2', ['booking' => $bookings['booking']]);
    }
    
}
