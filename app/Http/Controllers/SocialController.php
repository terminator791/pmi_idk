<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{
    //
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Cari user berdasarkan email
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            // Jika user ditemukan, perbarui data selain password
            $user->update([
            ]);
        } else {
            // Jika user tidak ditemukan, buat user baru dengan password acak
            $user = User::create([
                'email' => $googleUser->email,
                'name' => $googleUser->name,
                'phone' => $googleUser->phone,
                'password' => Hash::make(Str::random(24)),
                'level' => "client",
                'email_verified_at' => now(),
            ]);
        }

        //  if (!$user->hasVerifiedEmail()) {
        //     $user->sendEmailVerificationNotification();
        // }

        $response = Http::get('http://127.0.0.1:8000/api/v1/room_type/getAll');

        $roomTypes = $response->json();

        // Login user
        Auth::login($user);
        return view('welcome', ['roomTypes' => $roomTypes]);
    }

    public function twitterRedirect(){
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();

        // Cari user berdasarkan email
        $user = User::where('email', $twitterUser->email)->first();

        if ($user) {
            // Jika user ditemukan, perbarui data selain password
            $user->update([
            ]);
        } else {
            // Jika user tidak ditemukan, buat user baru dengan password acak
            $user = User::create([
                'email' => $twitterUser->email,
                'name' => $twitterUser->name,
                'password' => Hash::make(Str::random(24)),
                'phone' => "0214",
                'level' => "client",
                'email_verified_at' => now(),
            ]);
        }

        //  if (!$user->hasVerifiedEmail()) {
        //     $user->sendEmailVerificationNotification();
        // }

        // Login user
        Auth::login($user);
        return view('welcome');
    }


    
}
