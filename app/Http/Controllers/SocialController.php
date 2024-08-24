<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')
            ->with(['access_type' => 'offline'])
            ->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $password = Str::random(24);

        // Send POST request to API endpoint
        $response = Http::post('http://dashboardpmi-booking_system.test/api/v1/registerSocial', [
            'email' => $googleUser->email,
            'name' => $googleUser->name,
            'phone' => $googleUser->phone ?? '',
            'password' => $password,
        ]);

        // dd($response);

        // Return response from API to client
        if ($response->successful()) {
            // Store access token in session
            $accessToken = $response->json()['access_token'];
            Session::put('access_token', $accessToken);

            Session::put('response', $response['data']);

            return redirect('/homeRegister')->with(['message' => 'Selamat Datang '.$googleUser->name]);
        } else {
            return back()->withErrors('Gagal membuat akun');
        }

    }

    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();
        $password = Str::random(24);

        // dd($twitterUser);

        // Send POST request to API endpoint
        $response = Http::post('http://dashboardpmi-booking_system.test/api/v1/registerSocial', [
            'email' => $twitterUser->email,
            'name' => $twitterUser->name,
            'phone' => $twitterUser->phone ?? '',
            'password' => $password,
        ]);

        // dd($response);

        // Return response from API to client
        if ($response->successful()) {
            // Store access token in session
            $accessToken = $response->json()['access_token'];
            Session::put('access_token', $accessToken);

            Session::put('response', $response['data']);

            return redirect('/homeRegister')->with(['message' => 'Selamat Datang '.$twitterUser->name]);
        } else {
            return back()->withErrors('Gagal membuat akun');
        }
    }
}
