<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriAset;
use Illuminate\Validation\Rule;

class kategoriAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->get('search');
        $query = KategoriAset::query(); 
        if ($searchTerm) {
            $query->where('nama', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('kode', 'LIKE', '%' . $searchTerm . '%');
        }
        $dataAsetPaginated = $query->simplePaginate(5); 
        $data['datakategoriAset'] = $dataAsetPaginated;
        $data['searchTerm'] = $searchTerm; 
    
        return view('kategoriAset.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategoriAset.create');
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
        return view('kategoriAset.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $kategoriAset = KategoriAset::findOrFail($id);
    return view('kategoriAset.edit', compact('kategoriAset'));
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
        $kategoriAset = kategoriAset::findOrFail($id);
        $kategoriAset->delete();
        return redirect()->route('kategoriAset.index')->with('delete', 'Data Berhasil Dihapus!');
    }
}