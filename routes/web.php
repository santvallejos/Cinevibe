<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/movie', function () {
    return view('movies.index');
})->name('movies.index');

Route::get('/register', function () {
    return view('register.index');
})->name('register.index');

Route::get('/login', function () {
    return view('login.index');
})->name('login.index');

Route::get('/select-armchair', function () {
    return view('cart.armchair.index');
})->name('armchair.index');

Route::get('/pay', function () {
    return view('cart.pay.index');
})->name('pay.index');
