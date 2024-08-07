<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $response = Http::withtoken(Session::get('access_token'))->put('http://127.0.0.1:8000/api/updatePassword', [
            'current_password' => $request->current_password,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        if ($response->status() !== 200) {
            return Redirect::back()->with('status', 'password-updated-failed');
        } 
        // dd($response['access_token'], session::get('access_token'));
        session::forget('access_token');
        Session::put('access_token', $response['access_token']);
        // $cookie = Cookie('token_id', $response['access_token'], 1);

        return back()->with('status', 'password-updated');
    }
}
