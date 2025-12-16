<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lokasiAset;
use App\Models\aset;

class lokasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
   $asetIdFilter = $request->get('aset_id');
        $query = LokasiAset::query();

        if ($asetIdFilter) {
            if ($asetIdFilter !== 'all') {
                $query->where('aset_id', $asetIdFilter); 
            }
        }
        
        $dataLokasiAset = $query->simplePaginate(10); 
        $data['datalokasiaset'] = $dataLokasiAset;
        $data['asetIdFilter'] = $asetIdFilter; 
        
        return view('lokasiAset.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $asetList = Aset::all(); 
        return view('lokasiAset.create', compact('asetList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Tambahkan validasi
    $request->validate([
        'aset_id'     => 'required|exists:aset,aset_id', // Memastikan aset_id wajib diisi dan ada di tabel aset
        'keterangan'  => 'required|max:255',
        'lokasi_text' => 'required|max:100',
        'rt'          => 'nullable|max:10', // Asumsi RT/RW tidak wajib
        'rw'          => 'nullable|max:10', 
    ]);
    
    // Jika validasi berhasil, lanjutkan proses store
    $data = $request->only([
        'aset_id', 
        'keterangan', 
        'lokasi_text', 
        'rt', 
        'rw'
    ]);
    
    // Kode store Anda
    LokasiAset::create($data);
    return redirect()->route('lokasiAset.index')->with('success', 'Penambahan Data Lokasi Aset Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lokasiAset = LokasiAset::findOrFail($id); 
        return view('lokasiAset.show', compact('lokasiAset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lokasiAset = LokasiAset::findOrFail($id);
        $asetList = Aset::all();
        return view('lokasiAset.edit', compact('asetList', 'lokasiAset')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lokasi_id = $id;
        $lokasiAset = lokasiAset::findOrFail($lokasi_id); 
        $lokasiAset->aset_id    = $request->aset_id;
        $lokasiAset->keterangan      = $request->keterangan;
        $lokasiAset->lokasi_text      = $request->lokasi_text;
        $lokasiAset->rt             = $request->rt;
        $lokasiAset->rw = $request->rw;

        $lokasiAset->save();
        return redirect()->route('lokasiAset.index')->with('update', 'Lokasi Aset Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lokasiAset = LokasiAset::findOrFail($id);
        $lokasiAset->delete();

        // Redirect pengguna
        return redirect()->route('lokasiAset.index')->with('success', 'Lokasi Aset berhasil dihapus!');
    }
}
