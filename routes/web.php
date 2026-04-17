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
