<?php

namespace App\Http\Controllers;
use App\Models\KategoriAset;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    public function index()
    {
        $kategori = KategoriAset::all();
        return view('kategori_aset.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori_aset.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:kategori_aset,kode',
            'deskripsi' => 'nullable',
        ]);

        KategoriAset::create($request->all());

        return redirect()->route('kategori-aset.index')
            ->with('success', 'Kategori aset berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriAset::findOrFail($id);
        return view('kategori_aset.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriAset::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:kategori_aset,kode,' . $kategori->kategori_id . ',kategori_id',
            'deskripsi' => 'nullable',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori-aset.index')
            ->with('success', 'Kategori aset berhasil diupdate');
    }

    public function destroy($id)
    {
        KategoriAset::destroy($id);

        return redirect()->route('kategori-aset.index')
            ->with('success', 'Kategori aset berhasil dihapus');
    }
}
