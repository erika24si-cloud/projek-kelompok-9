<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warga;
use App\Models\aset;
use App\Models\kategoriAset;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalWarga = warga::count();
        $totalAset = aset::count();
        $totalKategori = kategoriAset::count();

        $wargaTerbaru = warga::latest('warga_id')->limit(5)->get();
        
        $asetTerbaru = aset::latest('aset_id')->with('kategori')->limit(5)->get(); 

        return view('dashboard.index', compact(
    'totalWarga', 
    'totalAset', 
    'totalKategori', 
    'wargaTerbaru', 
    'asetTerbaru'
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
