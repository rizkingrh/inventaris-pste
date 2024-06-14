<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangInventaris;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangInventarisController extends Controller
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
            $data = BarangInventaris::with('barang')
                ->where('kode_inventaris', 'like', '%'. $searchKey. '%')
                ->orWhere('tanggal_masuk', 'like', '%'. $searchKey. '%')
                ->orWhere('status_barang', 'like', '%'. $searchKey. '%')
                ->orWhereHas('barang', function($query) use ($searchKey) {
                    $query->where('nama_barang', 'like', '%' . $searchKey . '%')
                        ->orWhere('kode_barang', 'like', '%' . $searchKey . '%');
                })
                ->get();
            $status = BarangInventaris::getStatus();

            // Ambil barang yang belum terdaftar di barang_inventaris
            $barangTerdata = BarangInventaris::pluck('barang_id');
            $barang = Barang::whereNotIn('id', $barangTerdata)->get();
        } else {
            $data = BarangInventaris::with('barang')->get();
            $status = BarangInventaris::getStatus();

            // Ambil barang yang belum terdaftar di barang_inventaris
            $barangTerdata = BarangInventaris::pluck('barang_id');
            $barang = Barang::whereNotIn('id', $barangTerdata)->get();
        }
        return view('baranginventaris.index', compact('data', 'status', 'barang'));
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
            'kode_inventaris' => 'required|string|unique:barang_inventaris,kode_inventaris|max:6',
            'tanggal_masuk' => 'required',
            'status_barang' => 'required',
            'barang_id' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_masuk'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_masuk'] = $formatdate;

        // Simpan data ke database
        BarangInventaris::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('barang-inventaris')->with('success', 'Barang berhasil dimasukkan kedalam inventaris!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'tanggal_masuk' => 'required',
            'status_barang' => '',
            'barang_id' => '',
        ]);

        $tanggal = $validatedData['tanggal_masuk'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_masuk'] = $formatdate;

        // Simpan data ke database
        BarangInventaris::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('barang-inventaris')->with('success', 'Barang inventaris berhasil di perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BarangInventaris::where('id', $id)->delete();
        return redirect('barang-inventaris')->with('success', 'Barang inventaris berhasil di hapus!');
    }
}
