<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
Route::get('/register', [RegisterController::class, 'showRegisterView'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginView'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Cierre de sesión seguro vía POST (evita CSRF en cierres de sesión vía GET)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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

Route::get('/terminos-condiciones', function () {
    return view('terms-and-conditions.index');
})->name('terms-and-conditions.index');

Route::get('/select-movie', function () {
    return view('cart.select-movie.index');
})->name('select-movie.index');

Route::get('/movie', function () {
    return view('cart.movie.index');
})->name('cart.movie.index');
