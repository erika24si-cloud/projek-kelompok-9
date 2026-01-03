<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mutasiAset;
use App\Models\aset;

class mutasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mutasiAset = mutasiAset::all();
        return view('mutasiAset.index' , compact('mutasiAset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asets = Aset::all();
        return view('mutasiAset.create', compact('asets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['aset_id']     = $request->aset_id;
        $data['tanggal']     = $request->tanggal;
        $data['jenis_mutasi']    = $request->jenis_mutasi;
        $data['keterangan']       = $request->keterangan;
        mutasiAset::create($data);
        return redirect()->route('mutasiAset.index')->with('success', 'Mutasi Aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('mutasiAset.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mutasiAset = mutasiAset::findOrFail($id);
        $asets            = Aset::all();
        return view('mutasiAset.edit', compact('mutasiAset', 'asets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mutasiAset            = mutasiAset::findOrFail($id);
        $mutasiAset->aset_id   = $request->aset_id;
        $mutasiAset->tanggal   = $request->tanggal;
        $mutasiAset->jenis_mutasi  = $request->jenis_mutasi;
        $mutasiAset->keterangan     = $request->keterangan;

        $mutasiAset->save();
        return redirect()->route('mutasiAset.index')->with('success', 'Perubahan Mutasi Aset berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mutasiAset = mutasiAset::findOrFail($id);
        $mutasiAset->delete();
        return redirect()->route('mutasiAset.index')->with('delete', 'Mutasi Aset berhasil dihapus!');
    }
}
