@extends('layouts.app')

@section('title', 'Edit Riwayat Pemeliharaan: ' . $pemeliharaanAset->tindakan)

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
                    <h5>Formulir Edit Riwayat Pemeliharaan</h5>
                </div>

                <div class="card-body">
                    {{-- TAMBAHAN: enctype wajib untuk upload file --}}
                    <form
                        method="POST"
                        action="{{ route('pemeliharaanAset.update', $pemeliharaanAset->pemeliharaan_id) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

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
                                        {{ old('aset_id', $pemeliharaanAset->aset_id) == $aset->aset_id ? 'selected' : '' }}
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
                                value="{{ old('tanggal', $pemeliharaanAset->tanggal->format('Y-m-d')) }}"
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
                                placeholder="Jelaskan tindakan pemeliharaan yang dilakukan"
                                required
                            >{{ old('tindakan', $pemeliharaanAset->tindakan) }}</textarea>
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
                                value="{{ old('biaya', $pemeliharaanAset->biaya) }}"
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
                                value="{{ old('pelaksana', $pemeliharaanAset->pelaksana) }}"
                            >
                            @error('pelaksana') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        {{-- TAMBAHAN: PREVIEW & INPUT MEDIA PEMELIHARAAN --}}
                        <div class="form-group mb-4">
                            <label class="form-label" for="media">Bukti Pembayaran / Media</label>
                            
                            {{-- Tampilkan bukti lama jika ada --}}
                            @if($pemeliharaanAset->media)
                                <div class="mb-3">
                                    <p class="text-sm text-muted">Bukti saat ini:</p>
                                    <a href="{{ asset('storage/' . $pemeliharaanAset->media) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $pemeliharaanAset->media) }}" 
                                             alt="Bukti Media" 
                                             style="max-width: 200px; border-radius: 8px;" 
                                             class="shadow-sm border">
                                    </a>
                                    <br><small class="text-info">*Klik gambar untuk memperbesar</small>
                                </div>
                            @endif

                            <input 
                                type="file" 
                                name="media" 
                                id="media" 
                                class="form-control @error('media') is-invalid @enderror"
                                accept="image/*"
                            >
                            <small class="text-muted">Pilih file baru jika ingin mengganti bukti. Format: JPG, PNG. Maks 2MB.</small>
                            @error('media') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('pemeliharaanAset.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection