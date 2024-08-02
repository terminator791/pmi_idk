<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Send POST request to API endpoint
    $response = Http::post('http://127.0.0.1:8000/api/register', [
        'email' => $request->email,
        'name' => $request->name,
        'password' => $request->password, // Hash password before sending
        'password_confirmation' => $request->password_confirmation, // Hash password confirmation
    ]);

    // Return response from API to client
    if ($response->successful()) {
        // Store access token in session
        $accessToken = $response->json()['access_token'];
        session(['access_token' => $accessToken]);

        return redirect('home');
    } else {
        return response()->json([
            'error' => $response->body()
        ], $response->status());
    }
}

}
