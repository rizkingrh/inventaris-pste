<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengadaan;
use App\Models\PengadaanItem;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengadaanController extends Controller
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
            $data = Pengadaan::with('supplier', 'user')
                ->where('nomer_pengadaan', 'like', '%'. $searchKey. '%')
                ->orWhere('tanggal_pengadaan', 'like', '%'. $searchKey. '%')
                ->orWhere('jenis_pengadaan', 'like', '%'. $searchKey. '%')
                ->orWhere('keterangan', 'like', '%'. $searchKey. '%')
                ->orWhereHas('supplier', function($query) use ($searchKey) {
                    $query->where('kode_supplier', 'like', '%' . $searchKey . '%');
                })
                ->orWhereHas('user', function($query) use ($searchKey) {
                    $query->where('name', 'like', '%' . $searchKey . '%');
                })
                ->get();
            $supplier = Supplier::all();
            $user = User::all();
        } else {
            $data = Pengadaan::with('supplier', 'user')->get();
            $supplier = Supplier::all();
            $user = User::all();
        }
        return view('pengadaan.index', compact('data', 'supplier', 'user'));
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
            'nomer_pengadaan' => 'required|string|unique:pengadaans,nomer_pengadaan|max:6',
            'tanggal_pengadaan' => 'required',
            'jenis_pengadaan' => 'required',
            'keterangan' => 'required',
            'supplier_id' => 'required',
            'user_id' => 'required',
        ]);

        $tanggal = $validatedData['tanggal_pengadaan'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_pengadaan'] = $formatdate;

        // Simpan data ke database
        Pengadaan::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('pengadaan')->with('success', 'Pengadaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengadaan::where('id', $id)->with('supplier')->first();
        $pengadaanItem = PengadaanItem::where('pengadaan_id', $id)->with('barang')->get();
        $barang = Barang::all();

        // Format harga
        foreach ($pengadaanItem as $item) {
            $item->formatPrice = 'Rp. ' . number_format($item->harga_beli, 0, ',', '.');
        }
        return view('pengadaan.show', compact('data', 'pengadaanItem', 'barang'));
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
            'tanggal_pengadaan' => 'required',
            'jenis_pengadaan' => 'required',
            'keterangan' => 'required',
            'supplier_id' => '',
            'user_id' => '',
        ]);

        $tanggal = $validatedData['tanggal_pengadaan'];
        $date = Carbon::createFromFormat('m/d/Y', $tanggal);

        Carbon::setLocale('id');

        $formatdate = $date->translatedFormat('l, d F Y');

        $validatedData['tanggal_pengadaan'] = $formatdate;

        // Simpan data ke database
        Pengadaan::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('pengadaan')->with('success', 'Pengadaan berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengadaan::where('id', $id)->delete();
        return redirect('pengadaan')->with('success', 'Pengadaan berhasil di hapus!');
    }
}
