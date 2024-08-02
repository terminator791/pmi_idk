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
        $roomTypes = cache()->rememberForever('roomTypes', function () {
            $response = Http::get('http://127.0.0.1:8000/api/v1/room_type/getAll');
            return $response->json();
        });

        return view('welcome', ['roomTypes' => $roomTypes]);
    }

}
