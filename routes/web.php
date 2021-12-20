<?php

use App\Http\Controllers\WeighingController;
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


Route::resource('/', WeighingController::class);
Route::get('/{id}/edit', [WeighingController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [WeighingController::class, 'update'])->name('update');
Route::get('/selesai', [WeighingController::class, 'selesai'])->name('selesai');
Route::get('/cetak', [WeighingController::class, 'cetak'])->name('cetak');
Route::get('/data', [WeighingController::class, 'data'])->name('data');
Route::get('/detail/{id}', [WeighingController::class, 'detail'])->name('detail');
Route::get('/cetakulang/{id}', [WeighingController::class, 'cetakulang'])->name('cetakulang');
Route::get('/admin', [WeighingController::class, 'admin'])->name('admin');
Route::get('/admin/delete/{id}', [WeighingController::class, 'destroy'])->name('admin.destroy');
