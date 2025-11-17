@extends('layouts.app')

@section('title', 'Edit Data Aset: ' . $aset->nama_aset)

@section('content')

    {{-- Tampilkan pesan error validasi di bagian atas jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Formulir Edit Data Aset: {{ $aset->nama_aset }}</h5>
                </div>
                
                <div class="card-body">
                    {{-- Form mengarah ke metode update() dengan aset_id --}}
                    <form 
                        method="POST" 
                        action="{{ route('aset.update', $aset->aset_id) }}"
                    >
                        @csrf 
                        @method('PUT') {{-- WAJIB: Menggunakan metode PUT untuk update --}}
                        
                        {{-- 1. PILIH KATEGORI (Foreign Key) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="kategori_id">Kategori Aset</label>
                            {{-- $kategoriAsetList diasumsikan dikirim dari AsetController@edit --}}
                            <select 
                                class="form-control @error('kategori_id') is-invalid @enderror" 
                                id="kategori_id" 
                                name="kategori_id"
                                required
                            >
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoriAsetList as $kategori)
                                    <option 
                                        value="{{ $kategori->kategori_id }}"
                                        {{-- Logika untuk mempertahankan nilai lama atau nilai database --}}
                                        {{ old('kategori_id', $aset->kategori_id) == $kategori->kategori_id ? 'selected' : '' }}
                                    >
                                        {{ $kategori->nama }} ({{ $kategori->kode }})
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 2. KODE ASET --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="kode_aset">Kode Aset</label>
                            <input 
                                type="text" 
                                class="form-control @error('kode_aset') is-invalid @enderror" 
                                id="kode_aset" 
                                name="kode_aset"
                                placeholder="Contoh: ELE-2025-001" 
                                {{-- Memuat data lama atau data database --}}
                                value="{{ old('kode_aset', $aset->kode_aset) }}"
                                required
                            >
                            @error('kode_aset') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 3. NAMA ASET --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="nama_aset">Nama Aset</label>
                            <input 
                                type="text" 
                                class="form-control @error('nama_aset') is-invalid @enderror" 
                                id="nama_aset" 
                                name="nama_aset"
                                placeholder="Contoh: Laptop Kerja Lenovo T14" 
                                value="{{ old('nama_aset', $aset->nama_aset) }}"
                                required
                            >
                            @error('nama_aset') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 4. TANGGAL PEROLEHAN --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="tgl_perolehan">Tanggal Perolehan</label>
                            <input 
                                type="date" 
                                class="form-control @error('tgl_perolehan') is-invalid @enderror" 
                                id="tgl_perolehan" 
                                name="tgl_perolehan"
                                value="{{ old('tgl_perolehan', $aset->tgl_perolehan) }}"
                                required
                            >
                            @error('tgl_perolehan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 5. NILAI PEROLEHAN --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="nilai_perolehan">Nilai Perolehan (Rp)</label>
                            <input 
                                type="number" 
                                class="form-control @error('nilai_perolehan') is-invalid @enderror" 
                                id="nilai_perolehan" 
                                name="nilai_perolehan"
                                placeholder="Contoh: 15000000" 
                                value="{{ old('nilai_perolehan', $aset->nilai_perolehan) }}"
                                min="0"
                                step="0.01"
                                required
                            >
                            @error('nilai_perolehan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                        
                        {{-- 6. KONDISI --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="kondisi">Kondisi Aset</label>
                            <select 
                                class="form-control @error('kondisi') is-invalid @enderror" 
                                id="kondisi" 
                                name="kondisi"
                                required
                            >
                                <option value="">-- Pilih Kondisi --</option>
                                @foreach(['baik', 'rusak', 'perbaikan'] as $kondisi)
                                    <option 
                                        value="{{ $kondisi }}"
                                        {{-- Logika untuk mempertahankan nilai lama atau nilai database --}}
                                        {{ old('kondisi', $aset->kondisi) == $kondisi ? 'selected' : '' }}
                                    >
                                        {{ ucfirst($kondisi) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kondisi') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('aset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection