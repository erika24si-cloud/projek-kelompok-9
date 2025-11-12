@extends('layouts.app')

@section('title', 'Daftar Kategori Aset')

@section('content')

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 mb-4 text-right">
            <a href="{{ route('kategoriAset.create') }}" class="btn btn-primary">Tambah Kategori Baru</a>
        </div>

        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Kategori Aset</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Kode</th>
                                    <th>Deskripsi</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datakategoriAset as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('kategoriAset.edit', $item->kategori_id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        {{-- Tombol HAPUS (Gunakan Form tersembunyi) --}}
                                        <form action="{{ route('kategoriAset.destroy', $item->kategori_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data {{ $item->nama }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data Kategori Aset yang tersimpan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
