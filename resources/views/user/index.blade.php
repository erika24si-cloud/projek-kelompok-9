@extends('layouts.app')

@section('title', 'Daftar Pengguna (User)')

@section('content')

{{-- Perbaikan: Mengganti grid besar dengan container div --}}
<div class="grid grid-cols-12 gap-x-6">

    {{-- Bagian Pencarian dan Tombol Tambah --}}
    {{-- Menggunakan d-flex untuk mensejajarkan kiri dan kanan --}}
    <div class="col-span-12 mb-4 d-flex justify-content-between align-items-center">
        
        {{-- Kiri: Form Pencarian --}}
        <div style="width: 50%;">
            <form method="GET" action="{{ route('user.index') }}" class="d-flex align-items-center gap-2">
                
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Cari Nama atau Email..." 
                    value="{{ request('search') }}" 
                    style="width: 250px;"
                >
                <br>
                    <button type="submit" class="btn btn-secondary">Cari</button>
                @if (request('search'))
                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                @endif
            </form>
        </div>

        {{-- Kanan: Tombol Tambah User Baru --}}
        <div class="text-right">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna Baru</a>
        </div>
    </div>
    
    <div class="col-span-12">
        <div class="card">
            {{-- ... (lanjutan Card, Table, dan Pagination) ... --}}
            
            <div class="card-header">
                <h5>Data Pengguna Sistem</h5>
            </div>

            <div class="card-body">
                {{-- Tampilkan notifikasi success atau delete --}}
                @if (session('success') || session('delete'))
                    <div class="alert alert-success">
                        {{ session('success') ?? session('delete') }}
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ ucfirst($item->role) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user {{ $item->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data Pengguna (User) yang tersimpan.</td>
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection