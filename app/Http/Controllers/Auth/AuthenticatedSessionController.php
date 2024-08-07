<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{

    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->all());
            $token = Http::post('http://127.0.0.1:8000/api/v1/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);
            
            if ($token->successful()) {
                
                Session::put('access_token', $token['access_token']);
                $response = Http::withToken($token['access_token'])->post('http://127.0.0.1:8000/api/v1/me');
                // Store the response in session
                Session::put('response', $response->json());

                // $cookie = Cookie('token_id', $token['access_token'], 1);
                return redirect('/homeRegister')->with(['message' => 'Selamat Datang']);
            } else {
                return back()->withErrors('Username atau Password Salah');
            }

            
    }

    public function destroy(Request $request): RedirectResponse
    {
        try {
            $token = Session::get('access_token');
            Http::withToken($token)->post('http://127.0.0.1:8000/api/logout');
            session()->invalidate();
            session()->flush();

            return redirect()->route('home');
        }catch (\Throwable $th) {
            return redirect()->route('home')->withErrors(['error' => 'Error. Coba Lagi Nanti.']);
        }
    }
}
