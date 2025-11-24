@extends('layouts.app')

@section('title', 'Daftar Aset')

@section('content')

<div class="grid grid-cols-12 gap-x-6">
        
        <div class="col-span-12 mb-4 d-flex justify-content-between align-items-center">
            
            <form method="GET" action="{{ route('aset.index') }}" class="d-flex align-items-center gap-2">
                
                <label for="filter_kondisi" class="form-label mb-0 me-2">Filter Kondisi :</label>
                <select name="kondisi" id="filter_kondisi" class="form-control w-auto" onchange="this.form.submit()">
                    <option value="all" {{ $kondisiFilter === 'all' || is_null($kondisiFilter) ? 'selected' : '' }}>Semua Kondisi</option>
                    <option value="Baik" {{ $kondisiFilter === 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak " {{ $kondisiFilter === 'Rusak ' ? 'selected' : '' }}>Rusak</option>
                    <option value="Perbaikian" {{ $kondisiFilter === 'Perbaikian' ? 'selected' : '' }}>Perbaikian</option>
                </select>
            </form>
            
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 mb-4 text-right">
            <a href="{{ route('aset.create') }}" class="btn btn-primary">Tambah Aset Baru</a>
        </div>

        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Aset</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Aset</th>
                                    <th>Nama Aset</th>
                                    <th>Kategori</th>
                                    <th>Tgl. Perolehan</th>
                                    <th>Nilai Perolehan</th>
                                    <th>Kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataaset as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- Mengambil data berdasarkan skema 'asets' --}}
                                    <td>{{ $item->kode_aset }}</td>
                                    <td>{{ $item->nama_aset }}</td>
                                    <td>{{ $item->kategori->nama ?? 'N/A' }}</td> {{-- Mengambil nama kategori dari relasi --}}
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_perolehan)->format('d/m/Y') }}</td>
                                    <td>Rp. {{ number_format($item->nilai_perolehan, 2, ',', '.') }}</td>
                                    <td>
                                        {{-- Menampilkan kondisi dalam format yang mudah dibaca --}}
                                        <span class="badge @if($item->kondisi == 'baik') bg-success @elseif($item->kondisi == 'rusak') bg-danger @else bg-warning @endif">
                                            {{ ucfirst($item->kondisi) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- Menggunakan aset_id sebagai parameter untuk Edit --}}
                                        <a href="{{ route('aset.edit', $item->aset_id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        {{-- Tombol HAPUS dengan aset_id --}}
                                        <form action="{{ route('aset.destroy', $item->aset_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aset {{ $item->nama_aset }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data Aset yang tersimpan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 mt-4">
         <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $dataaset->links() }}
        </div>
    </div>
</div>

    </div>
@endsection
