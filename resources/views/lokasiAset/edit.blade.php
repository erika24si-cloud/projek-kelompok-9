@extends('layouts.app')

@section('title', 'Edit Data Lokasi Aset: ' . $lokasiAset->lokasi_text)

@section('content')

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Formulir Edit Data Lokasi Aset: {{ $lokasiAset->lokasi_text }}</h5>
                </div>

                <div class="card-body">
                    <form
                        method="POST"
                        action="{{ route('lokasiAset.update', $lokasiAset->lokasi_id) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        {{-- 1. PILIH ASET --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="aset_id">Pilih Aset</label>
                            <select
                                class="form-control @error('aset_id') is-invalid @enderror"
                                id="aset_id"
                                name="aset_id"
                                required
                            >
                                <option value="">-- Pilih Aset yang akan Diberi Lokasi --</option>
                               @foreach($asetList as $aset)
                                    <option
                                        value="{{ $aset->aset_id }}"
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
                                required
                            >{{ old('keterangan', $lokasiAset->keterangan) }}</textarea>
                            @error('keterangan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 3. LOKASI TEXT --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="lokasi_text">Nama Tempat / Lokasi Umum</label>
                            <input
                                type="text"
                                class="form-control @error('lokasi_text') is-invalid @enderror"
                                id="lokasi_text"
                                name="lokasi_text"
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
                                    value="{{ old('rw', $lokasiAset->rw) }}"
                                >
                                @error('rw') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- TAMBAHAN: PREVIEW & INPUT MEDIA LOKASI --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="media">Media / Foto Lokasi</label>
                            
                            {{-- Tampilkan foto lokasi lama jika ada --}}
                            @if($lokasiAset->media)
                                <div class="mb-3">
                                    <p class="text-sm text-muted">Foto lokasi saat ini:</p>
                                    <img src="{{ asset('storage/' . $lokasiAset->media) }}" 
                                         alt="Media Lokasi" 
                                         style="max-width: 250px; border-radius: 8px;" 
                                         class="shadow-sm border">
                                </div>
                            @endif

                            <input 
                                type="file" 
                                name="media" 
                                id="media" 
                                class="form-control @error('media') is-invalid @enderror"
                                accept="image/*"
                            >
                            <small class="text-muted">Pilih file baru jika ingin mengganti foto lokasi. Format: JPG, PNG. Maks 2MB.</small>
                            @error('media') <div class="text-danger mt-1">{{ $message }}</div> @enderror
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