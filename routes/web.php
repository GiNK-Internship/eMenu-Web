<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('historypage.historypage');
});

Route::get('/detailpage', [DetailController::class, 'index'])->name('detailpage');
Route::get('/cartpage', [CartController::class, 'index'])->name('cartpage');
Route::get('/homepage', [HomeController::class, 'index'])->name('homepage');
