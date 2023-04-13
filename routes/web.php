<?php

use App\Http\Controllers\CRUDController;
use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/create', [HomeController::class, 'store'])->name('store');
Route::get('/buku/edit/{id}', [HomeController::class, 'edit'])->name('edit'); // Rute untuk halaman edit
Route::put('/buku/update/{id}', [HomeController::class, 'update'])->name('update'); // Rute untuk proses update
Route::delete('/buku/delete/{id}', [HomeController::class, 'destroy'])->name('delete'); // Rute untuk proses delete

Route::resource('Buku', CRUDController::class);
