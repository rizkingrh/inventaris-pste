<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
            $data = Supplier::where('kode_supplier', 'like', '%'. $searchKey. '%')
                ->orWhere('alamat_supplier', 'like', '%'. $searchKey. '%')
                ->orWhere('alamat', 'like', '%'. $searchKey. '%')
                ->orWhere('no_telp', 'like', '%'. $searchKey. '%')
                ->get();
        } else {
            $data = Supplier::all();
        }
        return view('supplier.index', compact('data'));
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
            'kode_supplier' => 'required|string|unique:suppliers,kode_supplier|max:6',
            'alamat_supplier' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        // Simpan data ke database
        Supplier::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('supplier')->with('success', 'Supplier berhasil ditambahkan!');
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
            'alamat_supplier' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        // Simpan data ke database
        Supplier::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('supplier')->with('success', 'Barang berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::where('id', $id)->delete();
        return redirect('supplier')->with('success', 'Supplier berhasil di hapus!');
    }
}
