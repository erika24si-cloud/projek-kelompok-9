@extends('layouts.app')

@section('title', 'Edit Aset: ' . $aset->name)

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
                    <h5>Formulir Edit Daftar Aset: {{ $aset->name }}</h5>
                </div>

                <div class="card-body">
                    <form
                        method="POST"
                        action="{{ route('aset.update', $aset->id) }}"
                    >
                        @csrf
                        @method('PUT')

                        {{-- Input Nama Kategori (name) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="category_name">Nama Kategori Aset</label>
                            <input
                                type="text"
                                {{-- Mengubah @error('nama') menjadi @error('name') --}}
                                class="form-control @error('name') is-invalid @enderror"
                                id="category_name"
                                name="name" {{-- Mengubah name="nama" menjadi name="name" --}}
                                placeholder="Contoh: Elektronik, Kendaraan, Bangunan"
                                {{-- Menggunakan $assetCategory->name --}}
                                value="{{ old('name', $aset->name) }}"
                                required
                            >
                            @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- Input Kode Aset (code) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="category_code">Kode Aset (Singkatan Unik)</label>
                            <input
                                type="text"
                                {{-- Mengubah @error('kode') menjadi @error('code') --}}
                                class="form-control @error('code') is-invalid @enderror"
                                id="category_code"
                                name="code" {{-- Mengubah name="kode" menjadi name="code" --}}
                                placeholder="Contoh: ELE, KDR, BGN"
                                {{-- Menggunakan $assetCategory->code --}}
                                value="{{ old('code', $aset->code) }}"
                                maxlength="20"
                                required
                            >
                            @error('code') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- Input Deskripsi (description) --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="category_description">Deskripsi</label>
                            <textarea
                                {{-- Mengubah @error('deskripsi') menjadi @error('description') --}}
                                class="form-control @error('description') is-invalid @enderror"
                                id="category_description"
                                name="description" {{-- Mengubah name="deskripsi" menjadi name="description" --}}
                                rows="3"
                                placeholder="Jelaskan jenis aset yang termasuk dalam kategori ini."
                            >{{ old('description', $aset->description) }}</textarea> {{-- Menggunakan $assetCategory->description --}}
                            @error('description') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            {{-- Mengubah route 'kategoriAset.index' menjadi 'assetCategories.index' --}}
                            <a href="{{ route('aset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
