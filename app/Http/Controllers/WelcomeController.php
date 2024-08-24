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

        return view('welcome', ['rooms' => $rooms, 'meetingRooms' => $meetingRooms, 'packageRooms' => $packageRooms]);
    }

    public function welcome(Request $request)
    {
        try {
            $user_email = Session('response')['email'];

            $response = Http::get('http://dashboardpmi-booking_system.test/api/v1/user_transaction/getUserTransaction', [
                'user_email' => $user_email,
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

            return view('welcome2', ['bookings' => $bookings]);

        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
        }

    }
}
