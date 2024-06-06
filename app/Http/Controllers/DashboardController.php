<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Barang;
use App\Models\KategoriBarang;

class DashboardController extends Controller
{
    public function index() {
        $tanggal = Carbon::now()->isoFormat('dddd, D MMMM YYYY');
        return view('dashboard', compact('tanggal'));
    }

    public function barang() {
        $barangs = Barang::all();
        return view('barang', compact('barangs'));
    }

    public function kategoriBarang() {
        $kategoriBarangs = KategoriBarang::all();
        return view('kategoriBarang', compact('kategoriBarangs'));
    }
    
}
