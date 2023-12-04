<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;

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

Route::get('/', [FrontController::class, 'index'])->name('home');


Route::post('/carro/add', [CartController::class, 'add'])->name('add');
Route::get('/carro/revisar', [CartController::class, 'checkout'])->name('checkout');
Route::get('/carro/vaciar', [CartController::class, 'clear'])->name('clear');
Route::post('/carro/quitar', [CartController::class, 'remove'])->name('remove');

Route::post('/carro/aumentar', [CartController::class, 'increment'])->name('increment');
Route::post('/carro/disminuir', [CartController::class, 'decrement'])->name('decrement');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
