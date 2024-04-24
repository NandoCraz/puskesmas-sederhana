<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/dashboard-admin', [DashboardController::class, 'index'])->middleware(['admin']);

Route::resource('/master/data-obat', ObatController::class)->middleware(['admin']);
Route::resource('/master/data-distribusi', DistribusiController::class)->middleware(['admin']);
Route::resource('/master/data-penerima', PenerimaController::class)->middleware(['admin']);

