<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warga;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['datawarga'] = warga::all();
		return view('warga.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all()) 
        $data['no_ktp'] = $request->no_ktp;
        $data['nama'] = $request->nama;
         $data['role'] = $request->role;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['agama'] = $request->agama;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['telp'] = $request->telepon;
        $data['email'] = $request->email;
        warga::create($data);
        return redirect()->route('warga.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('warga.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $warga = warga::findOrFail($id);
        return view('warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warga_id = $id;
        $warga = warga::findOrFail($warga_id);

        $warga->no_ktp = $request->no_ktp;
        $warga->nama  = $request->nama;
        $warga->role = $request->role;
        $warga->jenis_kelamin   = $request->jenis_kelamin;
        $warga->agama   = $request->agama;
        $warga->pekerjaan   = $request->pekerjaan;
        $warga->telp   = $request->telp;
        $warga->email   = $request->email;
        
        $warga->save();
        return redirect()->route('warga.index')->with('update', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warga = warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('delete', 'Data Berhasil Dihapus!');
    }
}
