<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aset;
use App\Models\kategoriAset;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kondisiFilter = $request->get('kondisi');
        $query = Aset::with('kategori');

    if ($kondisiFilter) {
        if ($kondisiFilter !== 'all') {
            $query->where('kondisi', $kondisiFilter);
        }
    }
        $dataAset = $query->simplePaginate(4);
    $data['dataaset'] = $dataAset;
    $data['kondisiFilter'] = $kondisiFilter; 
    
    return view('aset.index', $data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriAsetList = kategoriAset::all();
        return view('aset.create', compact('kategoriAsetList'));
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

        if ($request->hasFile('media') && $request->file('media')->isValid()) {
        $path = $request->file('media')->store('aset', 'public');
        $data['media'] = $path;
    }
    
        Aset::create($data);
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
        $kategoriAsetList = kategoriAset::all();
        return view('aset.edit', compact('kategoriAsetList', 'aset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aset_id = $id;
        $aset = Aset::findOrFail($aset_id); 
        $aset->kategori_id     = $request->kategori_id;
        $aset->kode_aset       = $request->kode_aset;
        $aset->nama_aset       = $request->nama_aset;
        $aset->tgl_perolehan   = $request->tgl_perolehan;
        $aset->nilai_perolehan = $request->nilai_perolehan;
        $aset->kondisi         = $request->kondisi;
        if ($request->hasFile('media')) {
        if ($aset->media && \Storage::disk('public')->exists($aset->media)) {
            \Storage::disk('public')->delete($aset->media);
        }
        $path = $request->file('media')->store('aset-media', 'public');
        $aset->media = $path;
    }
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
