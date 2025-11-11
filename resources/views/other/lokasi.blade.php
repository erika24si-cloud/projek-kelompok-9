@extends('layouts.app')

@section('title', 'Input Lokasi Aset')

@section('content')

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Formulir Tambah Lokasi Aset Baru</h5>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf {{-- Wajib untuk keamanan Laravel --}}
                        
                        <div class="form-group mb-4">
                            <label class="form-label" for="nama_aset">Nama Aset yang Tercantum</label>
                            {{-- Field ini bisa diubah menjadi <select> jika data aset sudah ada di database --}}
                            <input 
                                type="text" 
                                class="form-control" 
                                id="nama_aset" 
                                name="asset_name" 
                                placeholder="Contoh: Genset Utama, Server Rak 1" 
                                required
                            >
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="keterangan">Keterangan Tambahan Aset</label>
                            <textarea 
                                class="form-control" 
                                id="keterangan" 
                                name="asset_description" 
                                rows="2" 
                                placeholder="Detail spesifik aset di lokasi ini."
                            ></textarea>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h6 class="mb-3">Detail Lokasi Fisik</h6>
                        
                        <div class="form-group mb-4">
                            <label class="form-label" for="nama_lokasi">Nama Lokasi/Jalan</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="nama_lokasi" 
                                name="location_name" 
                                placeholder="Contoh: Jl. Sudirman No. 12" 
                                required
                            >
                        </div>

                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-12 sm:col-span-6 form-group mb-4">
                                <label class="form-label" for="rt">RT</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="rt" 
                                    name="rt" 
                                    placeholder="001" 
                                    maxlength="3"
                                >
                            </div>
                            <div class="col-span-12 sm:col-span-6 form-group mb-4">
                                <label class="form-label" for="rw">RW</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="rw" 
                                    name="rw" 
                                    placeholder="005" 
                                    maxlength="3"
                                >
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Lokasi Aset</button>
                            <button type="reset" class="btn btn-secondary">Reset Formulir</button>
                        </div>
                    </form>
                    
                    {{-- FORMULIR INPUT LOKASI ASET SELESAI --}}
                </div>
            </div>
        </div>
    </div>
    @endsection