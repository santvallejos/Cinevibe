<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\PurchaseController;

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
| Películas (resource)
|--------------------------------------------------------------------------
*/
Route::resource('movies', MovieController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

/*
|--------------------------------------------------------------------------
| Salas (resource)
|--------------------------------------------------------------------------
*/
Route::resource('theaters', TheaterController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

/*
|--------------------------------------------------------------------------
| Funciones / ShowTimes
|--------------------------------------------------------------------------
*/
Route::get('/showtimes', [ShowTimeController::class, 'index'])->name('showtimes.index');
Route::get('/showtimes/create', [ShowTimeController::class, 'create'])->name('showtimes.create');
Route::post('/showtimes', [ShowTimeController::class, 'store'])->name('showtimes.store');
Route::delete('/showtimes/{showtime}', [ShowTimeController::class, 'destroy'])->name('showtimes.destroy');
// Funciones por película
Route::get('/movies/{movie}/showtimes', [ShowTimeController::class, 'byMovie'])->name('movies.showtimes');

/*
|--------------------------------------------------------------------------
| Registro / Login
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisterController::class, 'showRegisterView'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/login', [LoginController::class, 'showLoginView'])
    ->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

// Cierre de sesión seguro vía POST (evita CSRF en cierres de sesión vía GET)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
/*
|--------------------------------------------------------------------------
| Panel Administración / Cliente
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index'])
        ->name('cliente.dashboard');
});



/*
|--------------------------------------------------------------------------
| Carrito / Flujo de Compra (requiere autenticación)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Paso 1: Selección de butacas
    Route::get('/select-armchair', [PurchaseController::class, 'selectArmchair'])->name('armchair.index');

    // Paso 2: Revisión de compra / checkout
    Route::post('/purchase/review', [PurchaseController::class, 'reviewPurchase'])->name('purchase.review');

    // Paso 3: Confirmar y pagar
    Route::post('/purchase/confirm', [PurchaseController::class, 'confirm'])->name('purchase.confirm');

    // Confirmación exitosa
    Route::get('/purchase/success', [PurchaseController::class, 'success'])->name('purchase.success');

    // Historial de compras del usuario
    Route::get('/purchase/history', [PurchaseController::class, 'history'])->name('purchase.history');
});

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

// Vista detalle de película en el flujo de compra
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('cart.movie.index');
