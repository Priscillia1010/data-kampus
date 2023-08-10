<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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
    return view('welcome');
});

Route::get('list/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('get-mahasiswa', [MahasiswaController::class, 'get_data']);
Route::post('store-mahasiswa', [MahasiswaController::class, 'store_mahasiswa']);
Route::put('get-mahasiswa/{id}', [MahasiswaController::class, 'get_detail']);
Route::delete('hapus-mahasiswa/{id}', [MahasiswaController::class, 'hapus_mahasiswa']);