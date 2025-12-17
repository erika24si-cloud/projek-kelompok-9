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

        $query = PemeliharaanAset::query();

        if ($search) {
            $query->where('tindakan', 'like', '%' . $search . '%')
                ->orWhere('pelaksana', 'like', '%' . $search . '%');
        }
        $pemeliharaanAset = $query->orderBy('tanggal', 'desc')->paginate(10);
        return view('pemeliharaanAset.index', compact('pemeliharaanAset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asets = Aset::all();
        return view('pemeliharaanAset.create', compact('asets'));
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
        PemeliharaanAset::create($data);
        return redirect()->route('pemeliharaanAset.index')->with('success', 'Riwayat Pemeliharaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pemeliharaanAset.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemeliharaanAset = PemeliharaanAset::findOrFail($id);
        $asets            = Aset::all();
        return view('pemeliharaanAset.edit', compact('pemeliharaanAset', 'asets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemeliharaanAset            = PemeliharaanAset::findOrFail($id);
        $pemeliharaanAset->aset_id   = $request->aset_id;
        $pemeliharaanAset->tanggal   = $request->tanggal;
        $pemeliharaanAset->tindakan  = $request->tindakan;
        $pemeliharaanAset->biaya     = $request->biaya;
        $pemeliharaanAset->pelaksana = $request->pelaksana;

        $pemeliharaanAset->save();
        return redirect()->route('pemeliharaanAset.index')->with('success', 'Perubahan Riwayat Pemeliharaan berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemeliharaanAset = PemeliharaanAset::findOrFail($id);
        $pemeliharaanAset->delete();
        return redirect()->route('pemeliharaanAset.index')->with('delete', 'Riwayat Pemeliharaan berhasil dihapus!');
    }
}
