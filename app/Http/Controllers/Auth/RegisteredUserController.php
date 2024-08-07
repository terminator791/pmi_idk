<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{

    public function create(Request $request): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Send POST request to API endpoint
    $response = Http::post('http://127.0.0.1:8000/api/v1/register', [
        'email' => $request->email,
        'name' => $request->name,
        'password' => $request->password, 
        'password_confirmation' => $request->password_confirmation, 
    ]);

    // Return response from API to client
    if ($response->successful()) {
        // Store access token in session
        $accessToken = $response->json()['access_token'];
        Session::put('access_token', $accessToken);

        $response = Http::withToken($accessToken)->post('http://127.0.0.1:8000/api/v1/me');
        // Store the response in session
        Session::put('response', $response->json());

        return redirect('/homeRegister')->with(['message' => 'Selamat Datang']);
    } else {
        return back()->withErrors('Gagal membuat akun');
    }
}

}
