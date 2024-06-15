<?php

namespace App\Http\Controllers;

use App\Models\BarangDipinjam;
use App\Models\BarangInventaris;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchKey = $request->searchKey;
        if (strlen($searchKey)) {
            $data = Peminjaman::with('user')
                ->where('nomor_peminjaman', 'like', '%'. $searchKey. '%')
                ->orWhere('tanggal_peminjaman', 'like', '%'. $searchKey. '%')
                ->orWhere('tanggal_pengembalian', 'like', '%'. $searchKey. '%')
                ->orWhere('keterangan', 'like', '%'. $searchKey. '%')
                ->orWhereHas('user', function($query) use ($searchKey) {
                    $query->where('name', 'like', '%' . $searchKey . '%');
                })
                ->get();
            $user = User::all();
        } else {
            $data = Peminjaman::with('user')->get();
            $user = User::all();
        }
        return view('peminjaman.index', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nomor_peminjaman' => 'required|string|unique:peminjamans,nomor_peminjaman|max:6',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => '',
            'user_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_peminjaman'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');
        $validatedData['tanggal_peminjaman'] = $formatdate;
        $validatedData['tanggal_pengembalian'] = 'Belum dikembalikan';

        // Simpan data ke database
        Peminjaman::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('peminjaman')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Peminjaman::where('id', $id)->with('user')->first();
        $barangDipinjam = BarangDipinjam::where('peminjaman_id', $id)->with('inventaris.barang', 'peminjaman')->get();
        $inventaris = BarangInventaris::all();
        return view('peminjaman.show', compact('data', 'barangDipinjam', 'inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'tanggal_pengembalian' => 'required',
            'user_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_pengembalian'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');
        $validatedData['tanggal_pengembalian'] = $formatdate;

        // Simpan data ke database
        Peminjaman::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('peminjaman')->with('success', 'Peminjaman berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peminjaman::where('id', $id)->delete();
        return redirect('peminjaman')->with('success', 'Peminjaman berhasil di hapus!');
    }
}
