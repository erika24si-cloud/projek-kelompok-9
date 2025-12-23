@extends('layouts.app')

@section('title', 'Tambah Riwayat Pemeliharaan Aset')

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
                    <h5>Formulir Tambah Riwayat Pemeliharaan</h5>
                </div>

                <div class="card-body">
                    {{-- TAMBAHAN: enctype wajib agar file bisa terkirim ke controller --}}
                    <form method="POST" action="{{ route('pemeliharaanAset.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="form-label" for="aset_id">Aset yang Dipelihara</label>
                            <select
                                class="form-control @error('aset_id') is-invalid @enderror"
                                id="aset_id"
                                name="aset_id"
                                required
                            >
                                <option value="">-- Pilih Aset --</option>
                                @foreach($asets as $aset)
                                    <option
                                        value="{{ $aset->aset_id }}"
                                        {{ old('aset_id') == $aset->aset_id ? 'selected' : '' }}
                                    >
                                        {{ $aset->nama_aset }} ({{ $aset->kode_aset }})
                                    </option>
                                @endforeach
                            </select>
                            @error('aset_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="tanggal">Tanggal Pemeliharaan</label>
                            <input
                                type="date"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal"
                                name="tanggal"
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                required
                            >
                            @error('tanggal') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="tindakan">Tindakan Pemeliharaan</label>
                            <textarea
                                class="form-control @error('tindakan') is-invalid @enderror"
                                id="tindakan"
                                name="tindakan"
                                rows="3"
                                placeholder="Jelaskan tindakan pemeliharaan yang dilakukan (Contoh: Ganti oli mesin, perbaikan komponen X)"
                                required
                            >{{ old('tindakan') }}</textarea>
                            @error('tindakan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="biaya">Biaya Pemeliharaan (Rp)</label>
                            <input
                                type="number"
                                class="form-control @error('biaya') is-invalid @enderror"
                                id="biaya"
                                name="biaya"
                                placeholder="Contoh: 500000"
                                value="{{ old('biaya') }}"
                                min="0"
                                step="any"
                                required
                            >
                            @error('biaya') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="pelaksana">Pelaksana</label>
                            <input
                                type="text"
                                class="form-control @error('pelaksana') is-invalid @enderror"
                                id="pelaksana"
                                name="pelaksana"
                                placeholder="Contoh: Tim Maintenance Internal / Bengkel Jaya Abadi"
                                value="{{ old('pelaksana') }}"
                            >
                            @error('pelaksana') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- TAMBAHAN: Input Media untuk Bukti Pemeliharaan --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="media">Bukti Pembayaran / Media (Opsional)</label>
                            <input 
                                type="file" 
                                name="media" 
                                id="media" 
                                class="form-control @error('media') is-invalid @enderror"
                                accept="image/*"
                            >
                            <small class="text-muted">Format: JPG, PNG. Maks 2MB. (Contoh: Foto kuitansi atau hasil perbaikan)</small>
                            @error('media') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>


                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Riwayat Pemeliharaan</button>
                            <a href="{{ route('pemeliharaanAset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection