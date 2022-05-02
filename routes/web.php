<?php

use App\Http\Controllers\ChairController;
use App\Http\Controllers\OrderController;
use App\Models\Chair;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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

Route::get('/', fn () => Inertia::render('Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'homeImageUrl' => url('images/congreso-expansion.jpg')
]));

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');
    Route::resource('orders', OrderController::class);
    Route::get('/chairs/select', [ChairController::class, 'select'])->name('chairs.select');
});

require __DIR__.'/auth.php';
