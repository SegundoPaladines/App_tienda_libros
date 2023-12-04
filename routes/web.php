<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LibroController;

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

Route::get('/libros', [LibroController::class, 'list'])->name('libros');

Route::get('/eliminar_libro/{id}', [LibroController::class, 'eliminar'])->name('eliminar-libro');

Route::get('/agregar_libro', [LibroController::class, 'addView'])->name('fmr-add-libro');
Route::post('/agregar_libro', [LibroController::class, 'add'])->name('add-libro');

Route::get('/editar_libro/{id}', [LibroController::class, 'editar'])->name('editar-libro');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('default-home');
