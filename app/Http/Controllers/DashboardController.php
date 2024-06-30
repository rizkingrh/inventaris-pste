<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $tanggal = Carbon::now()->isoFormat('dddd, D MMMM YYYY');
        $totalUser = User::count();
        $totalBarang = Barang::count();
        return view('dashboard', compact('tanggal', 'totalBarang', 'totalUser'));
    }
}
