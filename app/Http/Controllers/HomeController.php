<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index()
    {
        // dd(session()->all());
        $responseData = cache()->rememberForever('roomData', function () {
            $response = Http::get('http://dashboardpmi-booking_system.test/api/v1/room_type/getAll');
            $response2 = Http::get('http://dashboardpmi-booking_system.test/api/v1/room_type/getAllPackage');

            return [
                'response' => $response->json(),
                'response2' => $response2->json(),
            ];
        });

        $rooms = array_filter($responseData['response'], function ($room) {
            return $room['id'] == 1 || $room['id'] == 2;
        });

        $meetingRooms = array_filter($responseData['response'], function ($meetingRoom) {
            return $meetingRoom['id'] != 1 && $meetingRoom['id'] != 2;
        });

        $packageRooms = $responseData['response2'];
        // dd($packageRooms);

        return view('register', ['rooms' => $rooms, 'meetingRooms' => $meetingRooms, 'packageRooms' => $packageRooms]);
    }
}
