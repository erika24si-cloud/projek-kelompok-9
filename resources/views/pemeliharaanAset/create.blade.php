@extends('layouts.app')

@section('title', 'Tambah Riwayat Pemeliharaan Aset')

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
                    <h5>Formulir Tambah Riwayat Pemeliharaan</h5>
                </div>
                
                <div class="card-body">
                    {{-- Form mengarah ke metode store() di PemeliharaanAsetController --}}
                    <form method="POST" action="{{ route('pemeliharaanAset.store') }}">
                        @csrf 
                        
                        {{-- 1. PILIH ASET (Foreign Key) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="aset_id">Aset yang Dipelihara</label>
                            {{-- $asets diasumsikan dikirim dari PemeliharaanAsetController@create --}}
                            <select 
                                class="form-control @error('aset_id') is-invalid @enderror" 
                                id="aset_id" 
                                name="aset_id"
                                required
                            >
                                <option value="">-- Pilih Aset --</option>
                                @foreach($asets as $aset)
                                    <option 
                                        value="{{ $aset->aset_id }}"
                                        {{ old('aset_id') == $aset->aset_id ? 'selected' : '' }}
                                    >
                                        {{-- Asumsi tabel Aset memiliki kolom 'nama_aset' dan 'kode' --}}
                                        {{ $aset->nama_aset }} ({{ $aset->kode_aset }})
                                    </option>
                                @endforeach
                            </select>
                            @error('aset_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 2. TANGGAL PEMELIHARAAN --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="tanggal">Tanggal Pemeliharaan</label>
                            <input 
                                type="date" 
                                class="form-control @error('tanggal') is-invalid @enderror" 
                                id="tanggal" 
                                name="tanggal"
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                required
                            >
                            @error('tanggal') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 3. TINDAKAN (Teks Area) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="tindakan">Tindakan Pemeliharaan</label>
                            <textarea 
                                class="form-control @error('tindakan') is-invalid @enderror" 
                                id="tindakan" 
                                name="tindakan"
                                rows="3"
                                placeholder="Jelaskan tindakan pemeliharaan yang dilakukan (Contoh: Ganti oli mesin, perbaikan komponen X)" 
                                required
                            >{{ old('tindakan') }}</textarea>
                            @error('tindakan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 4. BIAYA (DECIMAL) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="biaya">Biaya Pemeliharaan (Rp)</label>
                            <input 
                                type="number" 
                                class="form-control @error('biaya') is-invalid @enderror" 
                                id="biaya" 
                                name="biaya"
                                placeholder="Contoh: 500000" 
                                value="{{ old('biaya') }}"
                                min="0"
                                step="any" {{-- Menggunakan 'any' untuk menerima nilai desimal --}}
                                required
                            >
                            @error('biaya') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 5. PELAKSANA --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="pelaksana">Pelaksana</label>
                            <input 
                                type="text" 
                                class="form-control @error('pelaksana') is-invalid @enderror" 
                                id="pelaksana" 
                                name="pelaksana"
                                placeholder="Contoh: Tim Maintenance Internal / Bengkel Jaya Abadi" 
                                value="{{ old('pelaksana') }}"
                            >
                            @error('pelaksana') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Riwayat Pemeliharaan</button>
                            <a href="{{ route('pemeliharaanAset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection