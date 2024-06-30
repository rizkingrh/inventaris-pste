<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangDipinjamController;
use App\Http\Controllers\BarangInventarisController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenempatanController;
use App\Http\Controllers\PenempatanItemController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PengadaanItemController;
use App\Http\Controllers\RuanganLabController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\BarangDipinjam;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'authenticate']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('pengadaan', PengadaanController::class);
    Route::resource('pengadaan-item', PengadaanItemController::class);
    Route::resource('penempatan', PenempatanController::class);
    Route::resource('penempatan-item', PenempatanItemController::class);
    Route::resource('mutasi', MutasiController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('barang-dipinjam', BarangDipinjamController::class);
});
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('barang', BarangController::class);
    Route::resource('kategori-barang', KategoriBarangController::class);
    Route::resource('level', LevelController::class);
    Route::resource('user', UserController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('ruangan-lab', RuanganLabController::class);
    Route::resource('barang-inventaris', BarangInventarisController::class);
});
