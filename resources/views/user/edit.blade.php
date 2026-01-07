@extends('layouts.app')

@section('title', 'Edit Pengguna: ' . $users->name)

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
                    <h5>Formulir Edit Pengguna: {{ $users->name }}</h5>
                </div>

                <div class="card-body">
                    <form
                        method="POST"
                        action="{{ route('user.update', $users->id) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        {{-- PREVIEW & INPUT FOTO PROFIL --}}
                        <div class="form-group mb-4 text-center">
                            <label class="form-label d-block text-left">Foto Profil</label>
                            
                            <div class="mb-3">
                                @if($users->profile)
                                    <img src="{{ asset('storage/' . $users->profile) }}" 
                                         alt="Profile Photo" 
                                         style="width: 120px; height: 120px; object-fit: cover;" 
                                         class="rounded-circle img-thumbnail shadow-sm">
                                    
                                    {{-- Tombol Hapus Foto Saja --}}
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-outline-danger" 
                                                onclick="if(confirm('Apakah Anda yakin ingin menghapus foto profil saja?')) { document.getElementById('form-hapus-foto').submit(); }">
                                            Hapus Foto Profil
                                        </button>
                                    </div>
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($users->name) }}&background=random&color=fff" 
                                         alt="Default Avatar" 
                                         style="width: 120px; height: 120px;" 
                                         class="rounded-circle img-thumbnail shadow-sm">
                                @endif
                            </div>

                            <input 
                                type="file" 
                                name="profile" 
                                class="form-control @error('profile') is-invalid @enderror"
                                accept="image/*"
                            >
                            <small class="text-muted">Pilih file baru jika ingin mengganti foto profil. Format: JPG, PNG. Maks 2MB.</small>
                            @error('profile') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="user_name">Nama Pengguna</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="user_name"
                                name="name"
                                placeholder="Masukkan nama lengkap pengguna"
                                value="{{ old('name', $users->name) }}"
                                required
                            >
                            @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="user_email">Alamat Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="user_email"
                                name="email"
                                placeholder="contoh@domain.com"
                                value="{{ old('email', $users->email) }}"
                                required
                            >
                            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="user_password">Password (Kosongkan jika tidak ingin diubah)</label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="user_password"
                                name="password"
                                placeholder="Minimal 8 karakter"
                            >
                            <small class="form-text text-muted">Hanya isi jika Anda ingin mengganti password pengguna.</small>
                            @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="user_password_confirmation">Konfirmasi Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="user_password_confirmation"
                                name="password_confirmation"
                                placeholder="Ketik ulang password"
                            >
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="user_role">Peran (Role)</label>
                            <select
                                class="form-control @error('role') is-invalid @enderror"
                                id="user_role"
                                name="role"
                                required
                            >
                                <option value="">Pilih Peran</option>
                                <option value="admin" {{ old('role', $users->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="guest" {{ old('role', $users->role) == 'guest' ? 'selected' : '' }}>Guest</option>
                            </select>
                            @error('role') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>


                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>

                    @if($users->profile)
                        <form id="form-hapus-foto" action="{{ route('user.hapus-foto', $users->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection