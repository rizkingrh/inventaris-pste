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
}
