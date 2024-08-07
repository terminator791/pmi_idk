<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $response = Session::get('response');
        return view('profile.edit', [
            'user' => $response,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $response = Http::withtoken(Session::get('access_token'))->put('http://127.0.0.1:8000/api/updateProfile', [
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        if ($response->status() !== 200) {
            return Redirect::back()->with('status', 'profile-updated-failed');
        }

        session::forget('response');

        try {
            $response = Http::withToken(Session::get('access_token'))->post('http://127.0.0.1:8000/api/me');

            // Store the response in session
            Session::put('response', $response->json());

        } catch (\Throwable $th) {
                return redirect()->route('login')->withErrors(['error' => 'Silahkan Login Terlebih dahulu']);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
