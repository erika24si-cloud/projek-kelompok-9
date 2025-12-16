@extends('layouts.admin.app')

@section('title', 'Kategori Aset')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Kategori Aset</h3>

    <a href="{{ route('kategori-aset.create') }}" class="btn btn-primary mb-3">
        + Tambah Kategori
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $i => $row)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $row->kode }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->deskripsi }}</td>
                <td>
                    <a href="{{ route('kategori-aset.edit', $row->kategori_id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('kategori-aset.destroy', $row->kategori_id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus data?')"
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
