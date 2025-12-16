@extends('layouts.app')

@section('title', 'Dashboard Default')

@section('content')

<div class="grid grid-cols-12 gap-x-6">
    <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card">
            <div class="card-header !pb-0 !border-b-0">
                <h5 class="text-blue-500">Total Data Warga</h5>
            </div>
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <h3 class="font-light flex items-center mb-0">
                        <i class="feather icon-users text-blue-500 text-[30px] mr-1.5"></i>
                        <span id="total-warga">{{ $totalWarga }}</span>
                    </h3>
                    <p class="mb-0 text-muted">Warga Tercatat</p>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                    <div class="bg-blue-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar"
                        style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card">
            <div class="card-header !pb-0 !border-b-0">
                <h5 class="text-green-500">Total Data Aset</h5>
            </div>
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <h3 class="font-light flex items-center mb-0">
                        <i class="feather icon-archive text-green-500 text-[30px] mr-1.5"></i>
                        <span id="total-aset">{{ $totalAset }}</span>
                    </h3>
                    <p class="mb-0 text-muted">Aset Tercatat</p>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                    <div class="bg-green-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar"
                        style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-4">
        <div class="card">
            <div class="card-header !pb-0 !border-b-0">
                <h5 class="text-yellow-500">Total Kategori Aset</h5>
            </div>
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <h3 class="font-light flex items-center mb-0">
                        <i class="feather icon-tag text-yellow-500 text-[30px] mr-1.5"></i>
                        <span id="total-kategori">{{ $totalKategori }}</span>
                    </h3>
                    <p class="mb-0 text-muted">Kategori Tercatat</p>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                    <div class="bg-yellow-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar"
                        style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-8 md:col-span-6">
        <div class="card table-card">
            <div class="card-header">
                <h5>Warga Terbaru</h5>
                <a href="{{ route('warga.index') }}" class="text-blue-500 text-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-full">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">No. KTP</th>
                                <th class="py-2 px-4 border-b">Nama</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- LOOPING DATA DARI VARIABEL $wargaTerbaru --}}
                            @forelse($wargaTerbaru as $warga)
                            <tr>
                                <td class="py-2 px-4">{{ $warga->no_ktp }}</td>
                                <td class="py-2 px-4">{{ $warga->nama }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('warga.edit', $warga->warga_id) }}" class="badge bg-yellow-500 text-white text-[12px] mx-1">Edit</a>
                                    <a href="{{ route('warga.destroy', $warga->warga_id) }}" class="badge bg-red-500 text-white text-[12px] mx-1">Hapus</a>
                                </td> 
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-2 px-4 text-center text-muted">Belum ada data warga terbaru yang tercatat.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card table-card">
            <div class="card-header">
                <h5>Aset Terbaru</h5>
                <a href="{{ route('aset.index') }}" class="text-green-500 text-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-full">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nama Aset</th>
                                <th class="py-2 px-4 border-b">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($asetTerbaru as $aset)
                            <tr>
                                <td class="py-2 px-4">{{ $aset->nama_aset }}</td>
                                <td class="py-2 px-4">
                                    @php
                                        // Menentukan warna badge berdasarkan kondisi
                                        $badgeClass = ($aset->kondisi == 'Baik') ? 'bg-green-500' : 'bg-red-500';
                                    @endphp
                                    <span class="badge {{ $badgeClass }} text-white">{{ $aset->kondisi }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="py-2 px-4 text-center text-muted">Belum ada data aset terbaru yang tercatat.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
{{-- Script JS tambahan jika diperlukan --}}
@endpush