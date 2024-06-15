<?php

namespace App\Http\Controllers;

use App\Models\PengadaanItem;
use Illuminate\Http\Request;

class PengadaanItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'harga_beli' => 'required|integer',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'pengadaan_id' => '',
            'barang_id' => 'required',
        ]);

        // Simpan data ke database
        PengadaanItem::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('pengadaan/'. $validatedData['pengadaan_id'] )->with('success', 'Item pengadaan berhasil ditambahkan!');
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
            'harga_beli' => 'required|integer|max:9999999999',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'pengadaan_id' => '',
            'barang_id' => 'required',
        ]);

        // Simpan data ke database
        PengadaanItem::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('pengadaan/'. $validatedData['pengadaan_id'] )->with('success', 'Item pengadaan berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        PengadaanItem::where('id', $id)->delete();
        $pengadaan_id = $request->input('pengadaan_id');
        return redirect('pengadaan/'.$pengadaan_id)->with('success', 'Item pengadaan berhasil di hapus!');
    }
}
