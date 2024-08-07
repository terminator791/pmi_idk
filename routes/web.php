<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordController;

Route::get('/dashboard', function () {
    $response = Session::get('response');
    return view('dashboard', compact('response'));
})->middleware(['AuthLoginCheck'])->name('dashboard');

Route::middleware('AuthLoginCheck')->group(function () {
    Route::get('/homeRegister', [HomeController::class, 'index'])->name('homeReg');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/room/details/{id}', [BookingController::class, 'show'])->name('room.details');
    Route::post('/booking/room', [BookingController::class, 'store'])->name('bookings.store');
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/', [WelcomeController::class, 'index'])->name('home');


Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');


Route::get('/konfirmasi', [PaymentController::class, 'index'])->name('konfirmasi');
// Route::get('/konfirmasi2', [PaymentController::class, 'index2'])->name('konfirmasi2');


Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback', [SocialController::class, 'googleCallback'])->name('google.callback');

Route::get('/auth/twitter/redirect', [SocialController::class, 'twitterRedirect'])->name('twitter.redirect');
Route::get('/twitter/callback', [SocialController::class, 'twitterCallback'])->name('twitter.callback');

Route::middleware('AuthLoginCheck')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});


require __DIR__.'/auth.php';
