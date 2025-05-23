<?php

namespace App\Http\Controllers;

use App\Models\RuanganLab;
use Illuminate\Http\Request;

class RuanganLabController extends Controller
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
            $lokasi = RuanganLab::getLokasi();
            $data = RuanganLab::where('kode_ruangan', 'like', '%'. $searchKey. '%')
                ->orWhere('nama_ruangan', 'like', '%'. $searchKey. '%')
                ->orWhere('lokasi_gedung', 'like', '%'. $searchKey. '%')
                ->orWhere('keterangan', 'like', '%'. $searchKey. '%')
                ->get();
        } else {
            $data = RuanganLab::all();
            $lokasi = RuanganLab::getLokasi();
        }
        return view('ruanganlab.index', compact('data', 'lokasi'));
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
            'kode_ruangan' => 'required|string|unique:ruangan_labs,kode_ruangan|max:6',
            'nama_ruangan' => 'required',
            'lokasi_gedung' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan data ke database
        RuanganLab::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('ruangan-lab')->with('success', 'Ruangan baru berhasil ditambahkan!');
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
            'nama_ruangan' => 'required',
            'lokasi_gedung' => '',
            'keterangan' => 'required',
        ]);

        // Simpan data ke database
        RuanganLab::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('ruangan-lab')->with('success', 'Ruangan lab berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RuanganLab::where('id', $id)->delete();
        return redirect('ruangan-lab')->with('success', 'Ruangan berhasil di hapus!');
    }
}
