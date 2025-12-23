@extends('layouts.app')

@section('title', 'Tambah Data Lokasi Aset Baru')

@section('content')

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
                    <h5>Formulir Tambah Data Lokasi Aset Baru</h5>
                </div>

                <div class="card-body">
                    {{-- TAMBAHAN: enctype wajib ada agar file media bisa terkirim --}}
                    <form method="POST" action="{{ route('lokasiAset.store') }}" enctype="multipart/form-data">
                        @csrf

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
                                        {{ old('aset_id') == $aset->aset_id ? 'selected' : '' }}
                                    >
                                        {{ $aset->nama_aset }} ({{ $aset->kode_aset }})
                                    </option>
                                @endforeach
                            </select>
                            @error('aset_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>


                        <div class="form-group mb-4">
                            <label class="form-label" for="keterangan">Keterangan Lokasi</label>
                            <textarea
                                class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan"
                                name="keterangan"
                                rows="3"
                                placeholder="Contoh: Terletak di Ruang Server Lantai 2, dalam Rak B."
                                required
                            >{{ old('keterangan') }}</textarea>
                            @error('keterangan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="lokasi_text">Nama Tempat / Lokasi Umum</label>
                            <input
                                type="text"
                                class="form-control @error('lokasi_text') is-invalid @enderror"
                                id="lokasi_text"
                                name="lokasi_text"
                                placeholder="Contoh: Gedung A, Lantai 2, Ruang Server"
                                value="{{ old('lokasi_text') }}"
                                required
                            >
                            @error('lokasi_text') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                            <div class="form-group mb-4">
                                <label class="form-label" for="rt">RT</label>
                                <input
                                    type="text"
                                    class="form-control @error('rt') is-invalid @enderror"
                                    id="rt"
                                    name="rt"
                                    placeholder="Contoh: 001"
                                    value="{{ old('rt') }}"
                                >
                                @error('rt') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="rw">RW </label>
                                <input
                                    type="text"
                                    class="form-control @error('rw') is-invalid @enderror"
                                    id="rw"
                                    name="rw"
                                    placeholder="Contoh: 002"
                                    value="{{ old('rw') }}"
                                >
                                @error('rw') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- TAMBAHAN: Input Media untuk Foto Lokasi --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="media">Foto / Denah Lokasi</label>
                            <input 
                                type="file" 
                                name="media" 
                                id="media" 
                                class="form-control @error('media') is-invalid @enderror"
                                accept="image/*"
                            >
                            <small class="text-muted">Opsional. Format: JPG, PNG. Maks 2MB.</small>
                            @error('media') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Lokasi Aset</button>
                            <a href="{{ route('lokasiAset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection