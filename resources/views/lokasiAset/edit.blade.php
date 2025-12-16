@extends('layouts.app')

@section('title', 'Edit Data Lokasi Aset: ' . $lokasiAset->lokasi_text)

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
                    <h5>Formulir Edit Data Lokasi Aset: {{ $lokasiAset->lokasi_text }}</h5>
                </div>
                
                <div class="card-body">
                    {{-- Form mengarah ke metode update() di LokasiAsetController --}}
                    <form 
                        method="POST" 
                        action="{{ route('lokasiAset.update', $lokasiAset->lokasi_id) }}"
                    >
                        @csrf 
                        @method('PUT') {{-- WAJIB: Menggunakan metode PUT untuk update --}}
                        
                        {{-- 1. PILIH ASET (Foreign Key) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="aset_id">Pilih Aset</label>
                            {{-- $asetList diasumsikan dikirim dari LokasiAsetController@edit --}}
                            <select 
                                class="form-control @error('aset_id') is-invalid @enderror" 
                                id="aset_id" 
                                name="aset_id"
                                required
                            >
                                <option value="">-- Pilih Aset yang akan Diberi Lokasi --</option>
                                {{-- Loop ini membutuhkan variabel $asetList dari controller --}}
                               @foreach($asetList as $aset)
                                    <option 
                                        value="{{ $aset->aset_id }}"
                                        {{-- Logika untuk mempertahankan nilai lama atau nilai database --}}
                                        {{ old('aset_id', $lokasiAset->aset_id) == $aset->aset_id ? 'selected' : '' }}
                                    >
                                        {{ $aset->nama_aset }} ({{ $aset->kode_aset }})
                                    </option>
                                @endforeach
                            </select>
                            @error('aset_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 2. KETERANGAN --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="keterangan">Keterangan Lokasi</label>
                            <textarea 
                                class="form-control @error('keterangan') is-invalid @enderror" 
                                id="keterangan" 
                                name="keterangan"
                                rows="3"
                                placeholder="Contoh: Terletak di Ruang Server Lantai 2, dalam Rak B."
                                required
                            >{{ old('keterangan', $lokasiAset->keterangan) }}</textarea>
                            @error('keterangan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 3. LOKASI TEXT (Nama Lokasi Umum) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="lokasi_text">Nama Tempat / Lokasi Umum</label>
                            <input 
                                type="text" 
                                class="form-control @error('lokasi_text') is-invalid @enderror" 
                                id="lokasi_text" 
                                name="lokasi_text"
                                placeholder="Contoh: Gedung A, Lantai 2, Ruang Server" 
                                value="{{ old('lokasi_text', $lokasiAset->lokasi_text) }}"
                                required
                            >
                            @error('lokasi_text') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                        
                        {{-- 4 & 5. RT / RW --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                            <div class="form-group mb-4">
                                <label class="form-label" for="rt">RT</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('rt') is-invalid @enderror" 
                                    id="rt" 
                                    name="rt"
                                    placeholder="Contoh: 001" 
                                    value="{{ old('rt', $lokasiAset->rt) }}"
                                >
                                @error('rt') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="rw">RW</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('rw') is-invalid @enderror" 
                                    id="rw" 
                                    name="rw"
                                    placeholder="Contoh: 002" 
                                    value="{{ old('rw', $lokasiAset->rw) }}"
                                >
                                @error('rw') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>


                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('lokasiAset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection