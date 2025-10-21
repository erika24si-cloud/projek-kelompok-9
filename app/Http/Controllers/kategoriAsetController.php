<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kategoriAset;

class kategoriAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['datakategoriAset'] = kategoriAset::all();
		return view('admin.kategoriAset.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategoriAset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all()) 
        $data['nama'] = $request->nama;
        $data['kode'] = $request->kode;
        $data['deskripsi'] = $request->deskripsi;
        kategoriAset::create($data);
        return redirect()->route('kategoriAset.index')->with('success', 'Penambahan Data Berhasil!');
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $data['datakategoriAset'] = kategoriAset::findOrFail($id);
    return view('admin.kategoriAset.edit', $data);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori_id = $id;
        $kategoriAset = kategoriAset::findOrFail($kategori_id);

        $kategoriAset->nama = $request->nama;
        $kategoriAset->kode  = $request->kode;
        $kategoriAset->deskripsi   = $request->deskripsi;
        

        $kategoriAset->save();
        return redirect()->route('kategoriAset.index')->with('update', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
