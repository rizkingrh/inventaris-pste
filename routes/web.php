<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangInventarisController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenempatanController;
use App\Http\Controllers\PenempatanItemController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PengadaanItemController;
use App\Http\Controllers\RuanganLabController;
use App\Http\Controllers\SupplierController;
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
    return redirect('/login');
});
Route::get('/tesmodal', function () {
    return view('tesmodal');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('kategori-barang', KategoriBarangController::class)->middleware('auth');
Route::resource('level', LevelController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('supplier', SupplierController::class)->middleware('auth');
Route::resource('ruangan-lab', RuanganLabController::class)->middleware('auth');
Route::resource('barang-inventaris', BarangInventarisController::class)->middleware('auth');
Route::resource('pengadaan', PengadaanController::class)->middleware('auth');
Route::resource('pengadaan-item', PengadaanItemController::class)->middleware('auth');
Route::resource('penempatan', PenempatanController::class)->middleware('auth');
Route::resource('penempatan-item', PenempatanItemController::class)->middleware('auth');