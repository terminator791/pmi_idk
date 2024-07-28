<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/register', function () {
    return view('register');
})->name('homeReg');

Route::get('/konfirmasi', function () {
    return view('konfirmasi');
})->name('konfirmasi');


Route::get('/login', function () {
    return view('login_default');
})->name('login');


