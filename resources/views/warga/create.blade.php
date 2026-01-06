@extends('layouts.app')

@section('title', 'Tambah Data Warga')

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
                    <h5>Formulir Tambah Data Warga Baru</h5>
                </div>
                
                <div class="card-body">
                    {{-- Form mengarah ke metode store() di WargaController --}}
                    <form method="POST" action="{{ route('warga.store') }}">
                        @csrf 
                        
                        {{-- 1. NOMOR KTP --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="no_ktp">Nomor KTP (Wajib & Unik)</label>
                            <input 
                                type="text" 
                                class="form-control @error('no_ktp') is-invalid @enderror" 
                                id="no_ktp" 
                                name="no_ktp" 
                                placeholder="Masukkan Nomor KTP (NIK)" 
                                value="{{ old('no_ktp') }}"
                                required
                            >
                            @error('no_ktp') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 2. NAMA LENGKAP --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input 
                                type="text" 
                                class="form-control @error('nama') is-invalid @enderror" 
                                id="nama" 
                                name="nama"
                                placeholder="Nama sesuai KTP" 
                                value="{{ old('nama') }}"
                                required
                            >
                            @error('nama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 3. JENIS KELAMIN --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select 
                                class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                id="jenis_kelamin" 
                                name="jenis_kelamin"
                                required
                            >
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                @foreach(['Laki-laki', 'Perempuan'] as $jk)
                                    <option 
                                        value="{{ $jk }}"
                                        {{ old('jenis_kelamin') == $jk ? 'selected' : '' }}
                                    >
                                        {{ $jk }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_kelamin') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 4. AGAMA --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="agama">Agama</label>
                            <input 
                                type="text" 
                                class="form-control @error('agama') is-invalid @enderror" 
                                id="agama" 
                                name="agama"
                                placeholder="Contoh: Islam, Kristen, Hindu" 
                                value="{{ old('agama') }}"
                                required
                            >
                            @error('agama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 5. PEKERJAAN --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="pekerjaan">Pekerjaan</label>
                            <input 
                                type="text" 
                                class="form-control @error('pekerjaan') is-invalid @enderror" 
                                id="pekerjaan" 
                                name="pekerjaan"
                                placeholder="Contoh: Wiraswasta, PNS, Pelajar" 
                                value="{{ old('pekerjaan') }}"
                                required
                            >
                            @error('pekerjaan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 6. NOMOR TELEPON --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="telp">Nomor Telepon (Opsional)</label>
                            <input 
                                type="tel" 
                                class="form-control @error('telp') is-invalid @enderror" 
                                id="telp" 
                                name="telp"
                                placeholder="Contoh: 081234567890" 
                                value="{{ old('telp') }}"
                            >
                            @error('telp') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- 7. EMAIL --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="email">Email (Opsional, Unik)</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email"
                                placeholder="Contoh: nama@domain.com" 
                                value="{{ old('email') }}"
                            >
                            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Data Warga</button>
                            <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection