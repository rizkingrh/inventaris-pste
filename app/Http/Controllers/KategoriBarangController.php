<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
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
            $data = KategoriBarang::where('kode_kategori', 'like', '%'. $searchKey. '%')
                ->orWhere('nama_kategori', 'like', '%'. $searchKey. '%')
                ->get();
        } else {
            $data = KategoriBarang::all();
        }
        return view('kategoribarang.index', compact('data'));


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
            'kode_kategori' => 'required|string|unique:kategori_barangs,kode_kategori|max:6',
            'nama_kategori' => 'required|string|unique:kategori_barangs,nama_kategori|max:50',
        ]);

        // Simpan data ke database
        KategoriBarang::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('kategori-barang')->with('success', 'Kategori barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBarang $kategoriBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
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
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|unique:kategori_barangs,nama_kategori|max:50',
        ]);

        // Simpan data ke database
        KategoriBarang::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('kategori-barang')->with('success', 'Kategori barang berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriBarang::where('id', $id)->delete();
        return redirect('kategori-barang')->with('success', 'Kategori barang berhasil di hapus!');
    }
}
