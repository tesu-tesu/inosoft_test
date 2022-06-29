<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kendaraan', [App\Http\Controllers\KendaraanController::class, 'index'])->name('kendaraan_index');
Route::get('/stok_kendaraan', [App\Http\Controllers\KendaraanController::class, 'stok'])->name('stok_kendaraan');


Route::group(['prefix' => 'motor'], function () {
    Route::get('/', [App\Http\Controllers\MotorController::class, 'index'])->name('motor_index');
    Route::get('/detail/{id}', [App\Http\Controllers\MotorController::class, 'getById'])->name('motor_detail');
    Route::post('/store', [App\Http\Controllers\MotorController::class, 'store'])->name('motor_store');
    Route::get('/delete/{id}', [App\Http\Controllers\MotorController::class, 'destroy'])->name('motor_delete');
    Route::post('/update/{id}', [App\Http\Controllers\MotorController::class, 'update'])->name('motor_delete');
});

Route::group(['prefix' => 'mobil'], function () {
    Route::get('/', [App\Http\Controllers\MobilController::class, 'index'])->name('mobil_index');
    Route::get('/detail/{id}', [App\Http\Controllers\MobilController::class, 'getById'])->name('mobil_detail');
    Route::post('/update/{id}', [App\Http\Controllers\MobilController::class, 'update'])->name('mobil_update');
    Route::post('/store', [App\Http\Controllers\MobilController::class, 'store'])->name('mobil_store');
    Route::get('/delete/{id}', [App\Http\Controllers\MobilController::class, 'destroy'])->name('mobil_delete');
});

Route::group(['prefix' => 'kendaraan'], function () {
    Route::get('/', [App\Http\Controllers\KendaraanController::class, 'index'])->name('kendaraan_index');
    Route::get('/stok', [App\Http\Controllers\KendaraanController::class, 'stok'])->name('kendaraan_stok');
    Route::get('/beli/{id}', [App\Http\Controllers\KendaraanController::class, 'beli'])->name('kendaraan_beli');
    Route::get('/laporan_penjualan', [App\Http\Controllers\KendaraanController::class, 'laporan'])->name('kendaraan_laporan_penjualan');
});

