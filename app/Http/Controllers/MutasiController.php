<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Penempatan;
use App\Models\RuanganLab;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MutasiController extends Controller
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
            $data = Mutasi::with('user', 'ruangan')
                ->where('nomor_mutasi', 'like', '%'. $searchKey. '%')
                ->orWhere('tanggal_mutasi', 'like', '%'. $searchKey. '%')
                ->orWhere('keterangan', 'like', '%'. $searchKey. '%')
                ->orWhereHas('ruangan', function($query) use ($searchKey) {
                    $query->where('kode_ruangan', 'like', '%' . $searchKey . '%');
                })
                ->orWhereHas('user', function($query) use ($searchKey) {
                    $query->where('name', 'like', '%' . $searchKey . '%');
                })
                ->orWhereHas('penempatan', function($query) use ($searchKey) {
                    $query->where('nomor_penempatan', 'like', '%' . $searchKey . '%');
                })
                ->get();
            $ruangan = RuanganLab::all();
            $penempatan = Penempatan::all();
            $user = User::all();
        } else {
            $data = Mutasi::with('ruangan', 'penempatan', 'user')->get();
            $ruangan = RuanganLab::all();
            $penempatan = Penempatan::all();
            $user = User::all();
        }
        return view('mutasi.index', compact('data', 'ruangan', 'penempatan', 'user'));
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
            'nomor_mutasi' => 'required|string|unique:mutasis,nomor_mutasi|max:6',
            'tanggal_mutasi' => 'required',
            'ruangan_id' => 'required',
            'user_id' => 'required',
            'penempatan_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_mutasi'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_mutasi'] = $formatdate;

        // Simpan data ke database
        Mutasi::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('mutasi')->with('success', 'Mutasi berhasil ditambahkan!');
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
            'tanggal_mutasi' => 'required',
            'ruangan_id' => 'required',
            'user_id' => 'required',
            'penempatan_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_mutasi'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_mutasi'] = $formatdate;

        // Simpan data ke database
        Mutasi::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('mutasi')->with('success', 'Mutasi berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mutasi::where('id', $id)->delete();
        return redirect('mutasi')->with('success', 'Mutasi berhasil di hapus!');
    }
}
