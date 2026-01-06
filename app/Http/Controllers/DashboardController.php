<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\kategoriAset;
use App\Models\mutasiAset;
use App\Models\pemeliharaanAset;
use App\Models\lokasiAset;

class DashboardController extends Controller
{
    /**
     * Display a list resource.
     */
    public function index()
    {
        // Gunakan cache untuk mempercepat loading
        // Cache akan expire setelah 5 menit
        $totalAset = cache()->remember('total_aset', 300, function () {
            return aset::count();
        });
        
        $totalKategori = cache()->remember('total_kategori', 300, function () {
            return kategoriAset::count();
        });
        
        $totalMutasi = cache()->remember('total_mutasi', 300, function () {
            return mutasiAset::count();
        });
        
        $totalPemeliharaan = cache()->remember('total_pemeliharaan', 300, function () {
            return pemeliharaanAset::count();
        });
        
        $totalLokasi = cache()->remember('total_lokasi', 300, function () {
            return lokasiAset::count();
        });

        return view('dashboard', compact(
            'totalAset',
            'totalKategori',
            'totalMutasi',
            'totalPemeliharaan',
            'totalLokasi'
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
