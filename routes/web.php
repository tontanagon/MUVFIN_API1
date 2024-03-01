<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function (Request $request) {
    $filmController = new FilmController();
    $film = $filmController->welcome($request);

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'films' => $film,
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home/{page?}', [FilmController::class, 'home'])->name('home');
    Route::get('/profile', [CustomerController::class, 'profile']);
    Route::get('/cart', function () {
        return Inertia::render('Cart');
    })->name('cart');
    Route::get('/orderhistory', [PaymentController::class, 'index'])->name('orderhistory');
    Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
});
