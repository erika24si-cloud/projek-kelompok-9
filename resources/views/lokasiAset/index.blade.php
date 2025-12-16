@extends('layouts.app')

@section('title', 'Daftar Lokasi Aset')

@section('content')

<div class="grid grid-cols-12 gap-x-6">

    {{-- Bagian Pencarian dan Tombol Tambah --}}
    <div class="col-span-12 mb-4 d-flex justify-content-between align-items-center">
        
        {{-- Form Pencarian --}}
        <div style="width: 50%;">
            {{-- Menggunakan route('lokasiAset.index') --}}
            <form method="GET" action="{{ route('lokasiAset.index') }}" class="d-flex align-items-center gap-2">
                
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Cari Keterangan, RT, atau RW..." 
                    value="{{ request('search') }}" 
                    style="width: 250px;"
                >
                <br>
                <button type="submit" class="btn btn-secondary">Cari</button>
                
                {{-- Tombol Reset Pencarian --}}
                @if (request('search'))
                    <a href="{{ route('lokasiAset.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                @endif
            </form>
        </div>

        {{-- Tombol Tambah Baru --}}
        <div class="text-right">
            {{-- Menggunakan route('lokasi_aset.create') --}}
            <a href="{{ route('lokasiAset.create') }}" class="btn btn-primary">Tambah Lokasi Baru</a>
        </div>
    </div>
    
    {{-- Bagian Tabel Data --}}
    <div class="col-span-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Lokasi Aset</h5>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Aset</th> {{-- Tampilkan ID Aset --}}
                                <th>Keterangan</th>
                                <th>Lokasi Teks</th>
                                <th>RT / RW</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Iterasi data, variabelnya disesuaikan menjadi $lokasiAset --}}
                            @forelse ($datalokasiaset as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->aset_id }}</td> 
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ Str::limit($item->lokasi_text, 50) }}</td> {{-- Gunakan Str::limit untuk teks panjang --}}
                                <td>{{ $item->rt }} / {{ $item->rw }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    {{-- Tombol Edit --}}
                                    {{-- Menggunakan route('lokasiAset.edit') dan primaryKey 'lokasi_id' --}}
                                    <a href="{{ route('lokasiAset.edit', $item->lokasi_id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    {{-- Tombol HAPUS (Gunakan Form tersembunyi) --}}
                                    {{-- Menggunakan route('lokasiAset.destroy') --}}
                                    <form action="{{ route('lokasiAset.destroy', $item->lokasi_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lokasi aset dengan Keterangan: {{ $item->keterangan }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data Lokasi Aset yang tersimpan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Bagian Pagination --}}
    <div class="col-span-12 mt-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{-- Pastikan data dari controller dipaginasi, contoh: $lokasiAset = LokasiAset::paginate(10); --}}
                @if ($datalokasiaset instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $datalokasiaset->links() }}
                @endif
            </div>
        </div>
    </div>

</div>

@endsection