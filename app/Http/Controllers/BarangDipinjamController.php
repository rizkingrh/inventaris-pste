<?php

namespace App\Http\Controllers;

use App\Models\BarangDipinjam;
use Illuminate\Http\Request;

class BarangDipinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'peminjaman_id' => 'required',
            'inventaris_id' => 'required',
        ]);

        // Simpan data ke database
        BarangDipinjam::create($validatedData);

        return redirect('peminjaman/'. $validatedData['peminjaman_id'] )->with('success', 'Barang berhasil ditambahkan!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        BarangDipinjam::where('id', $id)->delete();
        $peminjaman_id = $request->input('peminjaman_id');
        return redirect('peminjaman/'. $peminjaman_id)->with('success', 'Barang berhasil di hapus!');
    }
}
