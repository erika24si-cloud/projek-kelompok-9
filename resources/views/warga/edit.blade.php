@extends('layouts.app')

@section('title', 'Edit Data Warga: ' . $warga->nama)

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
                    <h5>Formulir Edit Data Warga: {{ $warga->nama }}</h5>
                </div>
                
                <div class="card-body">
                    {{-- Form mengarah ke metode update() dengan warga_id --}}
                    <form 
                        method="POST" 
                        action="{{ route('warga.update', $warga->warga_id) }}"
                    >
                        @csrf 
                        @method('PUT') {{-- WAJIB: Menggunakan metode PUT untuk update --}}

                        {{-- 1. NOMOR KTP --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="no_ktp">Nomor KTP (Wajib & Unik)</label>
                            <input 
                                type="text" 
                                class="form-control @error('no_ktp') is-invalid @enderror" 
                                id="no_ktp" 
                                name="no_ktp" 
                                placeholder="Masukkan Nomor KTP (NIK)" 
                                {{-- Memuat data lama atau data database --}}
                                value="{{ old('no_ktp', $warga->no_ktp) }}"
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
                                value="{{ old('nama', $warga->nama) }}"
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
                                        {{-- Mempertahankan nilai lama atau nilai database --}}
                                        {{ old('jenis_kelamin', $warga->jenis_kelamin) == $jk ? 'selected' : '' }}
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
                                value="{{ old('agama', $warga->agama) }}"
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
                                value="{{ old('pekerjaan', $warga->pekerjaan) }}"
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
                                value="{{ old('telp', $warga->telp) }}"
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
                                value="{{ old('email', $warga->email) }}"
                            >
                            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection