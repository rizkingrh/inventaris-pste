<?php

namespace App\Http\Controllers;

use App\Models\BarangInventaris;
use App\Models\Penempatan;
use App\Models\PenempatanItem;
use App\Models\RuanganLab;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenempatanController extends Controller
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
            $data = Penempatan::with('user', 'ruangan')
                ->where('nomor_penempatan', 'like', '%'. $searchKey. '%')
                ->orWhere('tanggal_penempatan', 'like', '%'. $searchKey. '%')
                ->orWhere('keterangan', 'like', '%'. $searchKey. '%')
                ->orWhereHas('ruangan', function($query) use ($searchKey) {
                    $query->where('kode_ruangan', 'like', '%' . $searchKey . '%');
                })
                ->orWhereHas('user', function($query) use ($searchKey) {
                    $query->where('name', 'like', '%' . $searchKey . '%');
                })
                ->get();
            $ruangan = RuanganLab::all();
            $user = User::all();
        } else {
            $data = Penempatan::with('user', 'ruangan')->get();
            $ruangan = RuanganLab::all();
            $user = User::all();
        }
        return view('penempatan.index', compact('data', 'ruangan', 'user'));
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
            'nomor_penempatan' => 'required|string|unique:penempatans,nomor_penempatan|max:6',
            'tanggal_penempatan' => 'required',
            'ruangan_id' => 'required',
            'user_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_penempatan'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_penempatan'] = $formatdate;

        // Simpan data ke database
        Penempatan::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('penempatan')->with('success', 'Penempatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penempatan::where('id', $id)->with('user')->first();
        $penempatanItem = PenempatanItem::where('penempatan_id', $id)->with('inventaris.barang', 'penempatan')->get();
        $inventaris = BarangInventaris::all();
        $status = PenempatanItem::getStatus();

        return view('penempatan.show', compact('data', 'penempatanItem', 'inventaris', 'status'));
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
            'tanggal_penempatan' => 'required',
            'ruangan_id' => 'required',
            'user_id' => 'required',
            'keterangan' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_penempatan'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_penempatan'] = $formatdate;

        // Simpan data ke database
        Penempatan::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('penempatan')->with('success', 'Penempatan berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penempatan::where('id', $id)->delete();
        return redirect('penempatan')->with('success', 'Penempatan berhasil di hapus!');
    }
}
