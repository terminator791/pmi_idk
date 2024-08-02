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
                $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/me');

                // Store the response in session
                Session::put('response', $response->json());

                if($response->status() == 401) {
                        $response =  Http::withToken($token)->post('http://127.0.0.1:8000/api/refresh');
                        $token = $response->json()['access_token'];

                        Session::put('access_token', $token);

                        return $next($request);

                }else{

                    return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
                }

            } catch (\Throwable $th) {
                    return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
            }
        }else{
            return $next($request);
        }
        
    }
}
