<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthLoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Session::get('access_token');

        if (!$token) {
            return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
        }

        $response = Session::get('response');

        if (!$response) {
            try {
                $apiResponse = Http::withToken($token)->get('http://127.0.0.1:8000/api/v1/me');

                if ($apiResponse->successful()) {
                    // Store the response in session
                    Session::put('response', $apiResponse->json());
                } else {
                    return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
                }

            } catch (\Throwable $th) {
                return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
            }
        }

        return $next($request);
    }
}
