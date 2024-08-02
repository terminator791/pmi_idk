<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // dd(session('token'));
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // dd($request->all());
            $token = Http::post('http://127.0.0.1:8000/api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);
            
            if ($token->successful()) {
                
                Session::put('access_token', $token['access_token']);
                $cookie = Cookie('token_id', $token['access_token'], 1);
                return redirect('/')->cookie($cookie);
            } else {
                return redirect()->back()->withErrors(['message' => 'Failed to retrieve token']);
            }

            
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $token = Session::get('access_token');
        $response =  Http::withToken($token)->post('http://127.0.0.1:8000/api/refresh');
        session()->invalidate();
        session()->flush();

        return redirect('/');
    }
}
