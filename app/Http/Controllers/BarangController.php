<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
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
            $data = Barang::with('kategoribarang')
                ->where('kode_barang', 'like', '%'. $searchKey. '%')
                ->orWhere('nama_barang', 'like', '%'. $searchKey. '%')
                ->orWhere('keterangan', 'like', '%'. $searchKey. '%')
                ->orWhere('merk', 'like', '%'. $searchKey. '%')
                ->orWhere('jumlah', 'like', '%'. $searchKey. '%')
                ->orWhere('satuan', 'like', '%'. $searchKey. '%')
                ->orWhereHas('kategoribarang', function($query) use ($searchKey) {
                    $query->where('nama_kategori', 'like', '%' . $searchKey . '%');
                })
                ->get();
            $kategoribarang = KategoriBarang::all();
        } else {
            $data = Barang::with('kategoribarang')->get();
            $kategoribarang = KategoriBarang::all();
        }
        return view('barang.index', compact('data', 'kategoribarang'));
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
            'kode_barang' => 'required|string|unique:barangs,kode_barang|max:6',
            'nama_barang' => 'required|string|max:50',
            'keterangan' => 'required',
            'merk' => 'required|max:50',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'kategori_id' => 'required|integer|max:50',
        ]);

        // Simpan data ke database
        Barang::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'merk' => 'required|string|max:50',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'kategori_id' => 'integer|max:50',
        ]);

        // Simpan data ke database
        Barang::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('barang')->with('success', 'Barang berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::where('id', $id)->delete();
        return redirect('barang')->with('success', 'Barang berhasil di hapus!');
    }
}
