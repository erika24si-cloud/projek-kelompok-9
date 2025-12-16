@extends('layouts.app')

@section('title', 'Edit Pengguna: ' . $users->name)

@section('content')

    {{-- Tampilkan pesan error validasi di bagian atas jika ada --}}
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
                    {{-- Form mengarah ke metode update() dan menggunakan @method('PUT') --}}
                    <form
                        method="POST"
                        action="{{ route('user.update', $users->id) }}"
                    >
                        @csrf
                        @method('PUT')

                        {{-- 1. Nama Pengguna --}}
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

                        {{-- 2. Email --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="users_email">Alamat Email</label>
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

                        {{-- 3. Password (Opsional untuk diubah) --}}
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

                        {{-- 4. Konfirmasi Password --}}
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
                        
                        {{-- 5. Role/Peran --}}
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
                                <option value="operator" {{ old('role', $users->role) == 'operator' ? 'selected' : '' }}>Operator</option>
                                <option value="viewer" {{ old('role', $users->role) == 'viewer' ? 'selected' : '' }}>Viewer</option>
                                {{-- Tambahkan opsi lain sesuai kebutuhan Anda --}}
                            </select>
                            @error('role') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>


                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection