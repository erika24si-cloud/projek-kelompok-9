@extends('layouts.app')

@section('title', 'Daftar Pengguna (User)')

@section('content')

<div class="grid grid-cols-12 gap-x-6">

    <div class="col-span-12 mb-4 d-flex justify-content-between align-items-center">

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

        <div class="text-right">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna Baru</a>
        </div>
    </div>

    <div class="col-span-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Pengguna Sistem</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-striped align-middle"> 
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Profil</th> 
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            
                            {{-- Kolom Foto Profil --}}
                            <td>
                            @if($item->profile)
                                @if(str_contains($item->profile, 'http'))
                                <img src="{{ $item->profile }}" 
                                alt="Avatar" 
                                style="width: 45px; height: 45px; object-fit: cover;" 
                                class="rounded-circle border shadow-sm">
                            @else
                           
                            <img src="{{ asset('storage/' . $item->profile) }}" 
                            alt="User Photo" 
                            style="width: 45px; height: 45px; object-fit: cover;" 
                            class="rounded-circle border shadow-sm">
                            @endif
                             @else
                            
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=random&color=fff" 
                             style="width: 45px; height: 45px;" class="rounded-circle border shadow-sm">
                             @endif
                            </td>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td> {{$item->role}}</td>
                            <td>{{ $item->email }}</td>
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
                            <td colspan="7" class="text-center">Belum ada data Pengguna (User) yang tersimpan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-span-12 mt-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection