@extends('layouts.app')

@section('title', 'Daftar Data Warga')

@section('content')

    
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 mb-4 text-right">
            {{-- Tombol untuk pindah ke halaman Tambah Data Warga --}}
            <a href="{{ route('warga.create') }}" class="btn btn-primary">Tambah Data Warga Baru</a>
        </div>
        
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Warga Tercatat</h5>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. KTP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Pekerjaan</th>
                                    <th>Telp</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datawarga as $warga)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $warga->no_ktp }}</td>
                                    <td>{{ $warga->nama }}</td>
                                    <td>{{ $warga->jenis_kelamin }}</td>
                                    <td>{{ $warga->agama }}</td>
                                    <td>{{ $warga->pekerjaan }}</td>
                                    <td>{{ $warga->telp }}</td>
                                    <td>{{ $warga->email }}</td>
                                    <td>
                                        {{-- Tombol EDIT --}}
                                        <a href="{{ route('warga.edit', $warga->warga_id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                        
                                        {{-- Tombol HAPUS --}}
                                        <form action="{{ route('warga.destroy', $warga->warga_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data {{ $warga->nama }} (KTP: {{ $warga->no_ktp }})?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada data warga yang tersimpan.</td>
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