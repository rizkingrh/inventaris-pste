<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
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
            $data = Level::where('nama_level', 'like', '%'. $searchKey. '%')->get();
        } else {
            $data = Level::all();
        }
        return view('level.index', compact('data'));
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
            'nama_level' => 'required|string|unique:levels,nama_level',
        ]);

        // Simpan data ke database
        Level::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('level')->with('success', 'Level user berhasil ditambahkan!');
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
            'nama_level' => 'required|string|unique:levels,nama_level|max:50',
        ]);

        // Simpan data ke database
        Level::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('level')->with('success', 'Level user berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::where('id', $id)->delete();
        return redirect('level')->with('success', 'Level user berhasil di hapus!');
    }
}
