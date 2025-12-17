@extends('layouts.app')

@section('title', 'Tambah Riwayat Mutasi Aset')

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
                    <h5>Formulir Tambah Riwayat Mutasi</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mutasiAset.store') }}">
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
                            <label class="form-label" for="tanggal">Tanggal Mutasi</label>
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
                            <label class="form-label" for="jenis_mutasi">Jenis mutasi</label>
                            <textarea
                                class="form-control @error('jenis_mutasi') is-invalid @enderror"
                                id="jenis_mutasi"
                                name="jenis_mutasi"
                                rows="3"
                                placeholder="Jelaskan jenis mutasi yang terjadi (Contoh: Pindah lokasi, perbaikan komponen X)"
                                required
                            >{{ old('jenis_mutasi') }}</textarea>
                            @error('jenis_mutasi') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <input
                                type="text"
                                class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan"
                                name="keterangan"
                                placeholder="Contoh: Tim Maintenance Internal / Bengkel Jaya Abadi"
                                value="{{ old('keterangan') }}"
                            >
                            @error('keterangan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Riwayat Mutasi</button>
                            <a href="{{ route('mutasiAset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
