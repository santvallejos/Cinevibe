<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/movie', function () {
    return view('movies.show');
})->name('movies.show');
