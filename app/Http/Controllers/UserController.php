<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
            $data = User::with('level')
                ->where('name', 'like', '%'. $searchKey. '%')
                ->orWhere('phone_number', 'like', '%'. $searchKey. '%')
                ->orWhere('username', 'like', '%'. $searchKey. '%')
                ->orWhereHas('level', function($query) use ($searchKey) {
                    $query->where('nama_level', 'like', '%' . $searchKey . '%');
                })
                ->get();
            $level = level::all();
        } else {
            $data = User::with('level')->get();
            $level = Level::all();
        }
    
        return view('user.index', compact('data', 'level'));
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
            'name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:25',
            'username' => 'required|string|unique:users,username|max:50',
            'password' => 'required|string',
            'level_id' => 'required|string',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        // Simpan data ke database
        User::create($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('user')->with('success', 'User baru berhasil ditambahkan!');
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
            'name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:25',
            'username' => 'required|string|max:50',
            'password' => 'required|string',
            'level_id' => 'required|string',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        // Simpan data ke database
        User::where('id', $id)->update($validatedData);

        // Redirect ke halaman yang diinginkan, misalnya index
        return redirect('user')->with('success', 'User berhasil di perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('user')->with('success', 'User berhasil di hapus!');
    }
}
