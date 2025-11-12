<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataaset'] = aset::all();
        return view('aset.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all())
        $data['kategori_id']     = $request->kategori_id;
        $data['kode_aset']       = $request->kode_aset;
        $data['nama_aset']       = $request->nama_aset;
        $data['tgl_perolehan']   = $request->tgl_perolehan;
        $data['nilai_perolehan'] = $request->nilai_perolehan;
        $data['kondisi']         = $request->kondisi;
        aset::create($data);
        return redirect()->route('aset.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('aset.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aset = aset::findOrFail($id);
        return view('aset.edit', compact('aset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aset_id = $id;
        $aset    = aset::findOrFail($aset);

        $aset->kategori_id     = $request->kategori_id;
        $aset->kode_aset       = $request->kode_aset;
        $aset->nama_aset       = $request->nama_aset;
        $aset->tgl_perolehan   = $request->tgl_perolehan;
        $aset->nilai_perolehan = $request->nilai_perolehan;
        $aset->kondisi         = $request->kondisi;

        $aset->save();
        return redirect()->route('aset.index')->with('update', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aset = aset::findOrFail($id);
        $aset->delete();
        return redirect()->route('aset.index')->with('delete', 'Data Berhasil Dihapus!');
    }
}
