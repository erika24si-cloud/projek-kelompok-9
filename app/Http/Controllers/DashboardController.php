<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warga;
use App\Models\aset;
use App\Models\kategoriAset;
use App\Models\lokasiAset;
use App\Models\mutasiAset;
use App\Models\pemeliharaanAset;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index()
{
    $totalWarga = warga::count();
    $totalAset = aset::count();
    $totalKategori = kategori_aset::count(); 
    $totalLokasi = lokasiAset::count();    
    $totalPemeliharaan = pemeliharaanAset::count();        
    $totalMutasi = mutasiAset::count();             

    $wargaTerbaru = warga::latest('warga_id')->limit(5)->get();
    $asetTerbaru = aset::latest('aset_id')->with('kategori')->limit(5)->get(); 
    $lokasiTerbaru = lokasiAset::latest('lokasi_id')->limit(5)->get();
    $pemeliharaanTerbaru = pemeliharaanAset::latest('pemeliharaan_id')->limit(5)->get();
    $mutasiTerbaru = mutasiAset::latest('mutasi_id')->limit(5)->get();

    return view('dashboard.index', compact(
        'totalWarga', 
        'totalAset', 
        'totalKategori',  
        'totalLokasi', 
        'totalPemeliharaan',
        'totalMutasi', 
        'wargaTerbaru', 
        'asetTerbaru',
        'lokasiTerbaru',
        'pemeliharaanTerbaru',
        'mutasiTerbaru'
    ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
