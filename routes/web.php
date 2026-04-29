<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('index');
})->name('index');

/*
|--------------------------------------------------------------------------
| Películas
|--------------------------------------------------------------------------
*/
Route::get('/peliculas', function () {
    return view('movies.index');
})->name('movies.index');

Route::view('/movies/eldiablo', 'movies.eldiablo');
Route::view('/movies/supermario', 'movies.supermario');
Route::view('/movies/michael', 'movies.michael');
Route::view('/movies/ElmagodelKremlin', 'movies.ElmagodelKremlin');
Route::view('/movies/elbufon2', 'movies.elbufon2');
Route::view('/movies/mortalKombat', 'movies.mortalKombat');
Route::view('/movies/nurenberg', 'movies.nurenberg');
Route::view('/movies/proyectofindelmundo', 'movies.proyectofindelmundo');

/*
|--------------------------------------------------------------------------
| Registro / Login
|--------------------------------------------------------------------------
*/
Route::get('/register', function () {
    return view('register.index');
})->name('register.index');

Route::get('/login', function () {
    return view('login.index');
})->name('login.index');

/*
|--------------------------------------------------------------------------
| Carrito / Pago
|--------------------------------------------------------------------------
*/
Route::get('/select-armchair', function () {
    return view('cart.armchair.index');
})->name('armchair.index');

Route::get('/pay', function () {
    return view('cart.pay.index');
})->name('pay.index');

Route::get('/sobre-nosotros', function () {
    return view('about-us.index');
})->name('about-us.index');

Route::get('/contacto', function () {
    return view('contact.index');
})->name('contact.index');
