@extends('layouts.admin.app')

@section('title', 'Edit Kategori Aset')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Edit Kategori Aset</h3>

    <form action="{{ route('kategori-aset.update', $kategori->kategori_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="{{ $kategori->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control"
                   value="{{ $kategori->kode }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $kategori->deskripsi }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('kategori-aset.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
