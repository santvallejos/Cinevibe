<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Auth;use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

// Home
Route::get('/', function () {
    $movies = \App\Models\Movie::all();
    return view('index', compact('movies'));
})->name('index');

/**
 * Panel de administrador
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Gestión de Películas
    Route::get('/admin/movies', [MovieController::class, 'adminIndex'])->name('admin.movies.index');
    Route::resource('movies', MovieController::class)->except(['index', 'show']);

    // Gestión de Salas
    Route::resource('theaters', TheaterController::class);

    // Gestión de Funciones
    Route::resource('showtimes', ShowTimeController::class)->except(['index']);
    Route::get('/showtimes', [ShowTimeController::class, 'index'])->name('showtimes.index');

    // Gestión de Clientes / Usuarios
    Route::resource('admin/users', UserController::class)->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'show'    => 'admin.users.show',
        'edit'    => 'admin.users.edit',
        'update'  => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
});

// Peliculas y Funciones
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{movie}/showtimes', [ShowTimeController::class, 'byMovie'])->name('movies.showtimes');

/**
 * Panel de cliente
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index'])
        ->name('cliente.dashboard');
});

// Autenticación de Usuarios
Route::get('/register', [RegisterController::class, 'showRegisterView'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/login', [LoginController::class, 'showLoginView'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Carrito de Compras y Flujo de Compra
Route::middleware('auth')->group(function () {
    // Paso 1: Selección de butacas
    Route::get('/select-armchair', [PurchaseController::class, 'selectArmchair'])->name('armchair.index');

    // Rutas del Carrito de Compras Multipelícula
    Route::get('/cart', [CarritoController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CarritoController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{showtime_id}', [CarritoController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/checkout', [CarritoController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/confirm', [CarritoController::class, 'confirm'])->name('cart.confirm');

    // Confirmación exitosa y utilidades de compra (mantener para éxito e historial)
    Route::get('/purchase/success', [PurchaseController::class, 'success'])->name('purchase.success');

    // Historial de compras del usuario
    Route::get('/purchase/history', [PurchaseController::class, 'history'])->name('purchase.history');

    // Visualización de boleto digital
    Route::get('/tickets/{ticket}', [PurchaseController::class, 'showTicket'])->name('tickets.show');

    // Gestión del perfil de usuario
    Route::get('/perfil', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil', [UserController::class, 'update'])->name('profile.update');
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


Route::get('/dashboard', function () {

    if (Auth::user()->rol_id == 1) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('cliente.dashboard');

})->middleware('auth')->name('dashboard');
