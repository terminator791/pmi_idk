<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    //
    public function index(Request $request)
{
    // dd($request->cookie('token_id'));
    $responseData = cache()->rememberForever('roomData', function () {
        $response = Http::get('http://127.0.0.1:8000/api/v1/room_type/getAll');
        return $response->json();
    });

    $rooms = array_filter($responseData, function ($room) {
        return $room['id'] == 1 || $room['id'] == 2;
    });

    $meetingRooms = array_filter($responseData, function ($meetingRoom) {
        return $meetingRoom['id'] != 1 && $meetingRoom['id'] != 2;
    });

    return view('welcome', ['rooms' => $rooms, 'meetingRooms' => $meetingRooms]);
}


}
