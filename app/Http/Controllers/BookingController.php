<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    //

    public function index(){
        return view('booking');
    }

    public function show($id)
{
    // dd(session()->all());
    // Melakukan GET
    $response = Http::get('http://127.0.0.1:8000/api/v1/room_type/getDetail', [
        'id' => $id,
    ]);

    $room = $response->json();
    // dd($room['room_images'][0]);

    return view('booking', ['room' => $room]);
}

public function store(Request $request)
{  
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post('http://127.0.0.1:8000/api/v1/booking/generateToken', [
        'user_email' => $request->user_email,
        'room_type_id' => $request->room_type_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'side' => "client",
        'amount' => $request->amount
    ]);
    // dd($response->json());
    if ($response->successful()) {
        // Berhasil menyimpan data booking
        return redirect()->route('home')->with(['message' => 'Booking berhasil disimpan']);
    } else {
        // Gagal menyimpan data booking
        return back()->withErrors("Booking gagal disimpan");
    }
}


}
