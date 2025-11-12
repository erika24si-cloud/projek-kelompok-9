@extends('layouts.app')

@section('title', 'Tambah Kategori Aset')

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
                    <h5>Formulir Tambah Kategori Aset Baru</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kategoriAset.store') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="form-label" for="nama_kategori">Nama Kategori Aset</label>
                            <input
                                type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="nama_kategori"
                                name="nama"
                                placeholder="Contoh: Elektronik, Kendaraan, Bangunan"
                                value="{{ old('nama') }}"
                                required
                            >
                            @error('nama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="kode_kategori">Kode Aset (Singkatan Unik)</label>
                            <input
                                type="text"
                                class="form-control @error('kode') is-invalid @enderror"
                                id="kode_kategori"
                                name="kode"
                                placeholder="Contoh: ELE, KDR, BGN"
                                value="{{ old('kode') }}"
                                maxlength="20"
                                required
                            >
                            @error('kode') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="deskripsi_kategori">Deskripsi</label>
                            <textarea
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                id="deskripsi_kategori"
                                name="deskripsi"
                                rows="3"
                                placeholder="Jelaskan jenis aset yang termasuk dalam kategori ini."
                            >{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                            <a href="{{ route('kategoriAset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
