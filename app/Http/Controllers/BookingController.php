<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    //

    public function index(){
        return view('booking');
    }

    public function show($id)
{
    // Melakukan FCKING GET
    $response = Http::get('http://127.0.0.1:8000/api/v1/room_type/getDetail', [
        'id' => $id,
    ]);

    $room = $response->json();

    // dd($room['room_images'][0]);



    return view('booking', ['room' => $room]);
}

public function store(Request $request)
{
    // dd($request->all());

    $data = $request->only(['email', 'room_type_id', 'start_date', 'end_date', 'amount']);

    $response = Http::post('http://127.0.0.1:8000/api/bookings', $data);

    if ($response->successful()) {

        // Berhasil menyimpan data booking
        return redirect()->route('home')->with('success', 'Booking berhasil disimpan.');
    } else {

        // Gagal menyimpan data booking
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan booking.');
    }
}


}
