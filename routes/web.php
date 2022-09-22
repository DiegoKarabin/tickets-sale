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
]));

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');

    Route::resource('orders', OrderController::class);
    Route::resource('chairs', ChairController::class)->only(['index']);

    Route::get('/chairs/select', [ChairController::class, 'select'])->name('chairs.select');
    Route::post('/chairs/occupy', [ChairController::class, 'occupy'])->name('chairs.occupy');
});

require __DIR__.'/auth.php';
