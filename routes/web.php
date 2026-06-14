<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/cart', [CarritoController::class, 'index'])
    ->name('cart.index');
Route::middleware(['auth'])->group(function () { 
    // Mostrar el carrito 
    Route::get('/carrito', [CarritoController::class, 'index']) 
                          ->name('cliente.carrito'); 
    // Agregar un producto 
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar']) 
                                   ->name('carrito.agregar'); 
    // Eliminar un producto 
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar']) 
                                           ->name('carrito.eliminar'); 
    // Confirmar la compra 
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar']) 
                                     ->name('carrito.confirmar'); 
                                       // Vista de compra confirmada (protegida: redirige si no hay sesión) 
    Route::get('/compra-confirmada', function () { 
        if (!session('total')) { 
            return redirect()->route('cliente.dashboard'); 
        } 
        return view('cart.compra-confirmada'); 
    })->name('compra.confirmada'); 
}); 



Route::get('/dashboard', function () {

    if (Auth::user()->rol_id == 1) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('cliente.dashboard');

})->middleware('auth')->name('dashboard');