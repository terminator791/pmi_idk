<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HandleExpiredToken
{
    public function handle($request, Closure $next)
    {
        $token = Session::get('access_token');

        if (! $token) {
            return redirect()->route('login')->withErrors(['message' => 'Silahkan Login Terlebih dahulu']);
        }

        try {
            $response = Http::withToken($token)->post('http://dashboardpmi-booking_system.test/api/me');

            if ($response->status() == 401) {
                try {

                    $response = Http::withToken($token)->post('http://dashboardpmi-booking_system.test/api/refresh');
                    $token = $response->json()['access_token'];

                    Session::put('access_token', $token);

                    $response = Http::withToken($token)->post('http://dashboardpmi-booking_system.test/api/me');

                    // Store the response in session
                    Session::put('response', $response->json());

                    return $next($request);
                } catch (\Throwable $th) {
                    return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
                }

            } else {
                // Store the response in session
                Session::put('response', $response->json());

                return $next($request);
            }

        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);

        }

    }
}
