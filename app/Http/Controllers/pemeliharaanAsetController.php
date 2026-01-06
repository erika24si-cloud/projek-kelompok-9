<?php
namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\pemeliharaanAset;
use Illuminate\Http\Request;

class pemeliharaanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = pemeliharaanAset::with('aset');

        if ($search) {
            $query->where('tindakan', 'like', '%' . $search . '%')
                ->orWhere('pelaksana', 'like', '%' . $search . '%');
        }
        $pemeliharaanAset = $query->orderBy('tanggal', 'desc')->simplePaginate(4);
        return view('pemeliharaan_aset.index', compact('pemeliharaanAset', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asets = aset::all();
        return view('pemeliharaan_aset.create', compact('asets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['aset_id']   = $request->aset_id;
        $data['tanggal']   = $request->tanggal;
        $data['tindakan']  = $request->tindakan;
        $data['biaya']     = $request->biaya;
        $data['pelaksana'] = $request->pelaksana;
        if ($request->hasFile('media') && $request->file('media')->isValid()) {
        $path = $request->file('media')->store('pemeliharaan-aset', 'public');
        $data['media'] = $path;
    }
        pemeliharaanAset::create($data);
        return redirect()->route('pemeliharaan-aset.index')->with('success', 'Riwayat Pemeliharaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pemeliharaan_aset.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemeliharaanAset = pemeliharaanAset::findOrFail($id);
        $asets            = aset::all();
        return view('pemeliharaan_aset.edit', compact('pemeliharaanAset', 'asets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemeliharaanAset            = pemeliharaanAset::findOrFail($id);
        $pemeliharaanAset->aset_id   = $request->aset_id;
        $pemeliharaanAset->tanggal   = $request->tanggal;
        $pemeliharaanAset->tindakan  = $request->tindakan;
        $pemeliharaanAset->biaya     = $request->biaya;
        $pemeliharaanAset->pelaksana = $request->pelaksana;
        if ($request->hasFile('media')) {
        if ($pemeliharaanAset->media && \Storage::disk('public')->exists($pemeliharaanAset->media)) {
            \Storage::disk('public')->delete($pemeliharaanAset->media);
        }
        $path = $request->file('media')->store('pemeliharaan-aset', 'public');
        $pemeliharaanAset->media = $path;
    }

        $pemeliharaanAset->save();
        return redirect()->route('pemeliharaan-aset.index')->with('success', 'Perubahan Riwayat Pemeliharaan berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemeliharaanAset = pemeliharaanAset::findOrFail($id);
        $pemeliharaanAset->delete();
        return redirect()->route('pemeliharaan-aset.index')->with('delete', 'Riwayat Pemeliharaan berhasil dihapus!');
    }
}
