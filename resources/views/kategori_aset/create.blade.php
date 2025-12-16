@extends('layouts.admin.app')

@section('title', 'Tambah Kategori Aset')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Tambah Kategori Aset</h3>

    <form action="{{ route('kategori-aset.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('kategori-aset.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
