<?php

namespace App\Http\Controllers;

use App\Models\PenempatanItem;
use Illuminate\Http\Request;

class PenempatanItemController extends Controller
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
            'status' => 'required',
            'penempatan_id' => 'required',
            'inventaris_id' => 'required',
        ]);

        // Simpan data ke database
        PenempatanItem::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('penempatan/'. $validatedData['penempatan_id'] )->with('success', 'Item penempatan berhasil ditambahkan!');
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
        PenempatanItem::where('id', $id)->delete();
        $penempatan_id = $request->input('penempatan_id');
        return redirect('penempatan/'. $penempatan_id)->with('success', 'Item penempatan berhasil di hapus!');
    }
}
