@extends('layouts.app')

@section('title', 'Dashboard')

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
                    <div class="bg-blue-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
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
                    <div class="bg-green-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
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
                    <div class="bg-yellow-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card">
            <div class="card-header !pb-0 !border-b-0">
                <h5 class="text-red-500">Total Pemeliharaan Aset</h5>
            </div>
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <h3 class="font-light flex items-center mb-0">
                        <i class="feather icon-settings text-red-500 text-[30px] mr-1.5"></i>
                        <span id="total-pemeliharaan">{{ $totalPemeliharaan }}</span>
                    </h3>
                    <p class="mb-0 text-muted">Pemeliharaan Tercatat</p>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                    <div class="bg-red-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card">
            <div class="card-header !pb-0 !border-b-0">
                <h5 class="text-cyan-500">Total Lokasi Aset</h5>
            </div>
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <h3 class="font-light flex items-center mb-0">
                        <i class="feather icon-map-pin text-cyan-500 text-[30px] mr-1.5"></i>
                        <span id="total-lokasi">{{ $totalLokasi }}</span>
                    </h3>
                    <p class="mb-0 text-muted">Titik Lokasi</p>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                    <div class="bg-cyan-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-4">
        <div class="card">
            <div class="card-header !pb-0 !border-b-0">
                <h5 class="text-purple-500">Total Mutasi Aset</h5>
            </div>
            <div class="card-body">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <h3 class="font-light flex items-center mb-0">
                        <i class="feather icon-repeat text-purple-500 text-[30px] mr-1.5"></i>
                        <span id="total-mutasi">{{ $totalMutasi }}</span>
                    </h3>
                    <p class="mb-0 text-muted">Mutasi Tercatat</p>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                    <div class="bg-purple-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-7 md:col-span-6">
        <div class="card table-card">
            <div class="card-header flex justify-between items-center">
                <h5>Warga Terbaru</h5>
                <a href="{{ route('warga.index') }}" class="text-blue-500 text-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-full text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-left">No. KTP</th>
                                <th class="py-2 px-4 border-b text-left">Nama</th>
                                <th class="py-2 px-4 border-b text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wargaTerbaru as $warga)
                            <tr>
                                <td class="py-2 px-4">{{ $warga->no_ktp }}</td>
                                <td class="py-2 px-4 font-semibold">{{ $warga->nama }}</td>
                                <td class="py-2 px-4 flex gap-1">
                                    <a href="{{ route('warga.edit', $warga->warga_id) }}" class="badge bg-yellow-500 text-white text-[10px]">Edit</a>
                                    <form action="{{ route('warga.destroy', $warga->warga_id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="badge bg-red-500 text-white text-[10px] border-0 cursor-pointer" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="py-2 px-4 text-center text-muted">Belum ada data warga.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-5 md:col-span-6">
        <div class="card table-card">
            <div class="card-header flex justify-between items-center">
                <h5>Aset Terbaru</h5>
                <a href="{{ route('aset.index') }}" class="text-green-500 text-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-full text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Nama Aset</th>
                                <th class="py-2 px-4 border-b text-left">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($asetTerbaru as $aset)
                            <tr>
                                <td class="py-2 px-4">{{ $aset->nama_aset }}</td>
                                <td class="py-2 px-4">
                                    @php $badgeClass = ($aset->kondisi == 'Baik') ? 'bg-green-500' : 'bg-red-500'; @endphp
                                    <span class="badge {{ $badgeClass }} text-white px-2 py-1 rounded" style="font-size: 10px;">{{ $aset->kondisi }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="2" class="py-2 px-4 text-center text-muted">Belum ada data aset.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 mt-4">
        <div class="card table-card">
            <div class="card-header flex justify-between items-center">
                <h5>Lokasi Aset Terbaru</h5>
                <a href="{{ route('lokasiAset.index') }}" class="text-cyan-500 text-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-full text-sm text-left">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Media</th>
                                <th class="py-2 px-4 border-b">Keterangan</th>
                                <th class="py-2 px-4 border-b">RT/RW</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lokasiTerbaru as $lokasi)
                            <tr>
                                <td class="py-2 px-4">
                                    @if($lokasi->media)
                                        <img src="{{ asset('storage/' . $lokasi->media) }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                    @else
                                        <span class="text-xs text-muted italic">No Image</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4">
                                    <div class="font-bold">{{ $lokasi->keterangan }}</div>
                                    <div class="text-[10px] text-muted">{{ Str::limit($lokasi->lokasi_text, 50) }}</div>
                                </td>
                                <td class="py-2 px-4 text-muted">{{ $lokasi->rt }}/{{ $lokasi->rw }}</td>
                                <td class="py-2 px-4 flex gap-1">
                                    <a href="{{ route('lokasiAset.edit', $lokasi->lokasi_id) }}" class="badge bg-yellow-500 text-white text-[10px]">Edit</a>
                                    <form action="{{ route('lokasiAset.destroy', $lokasi->lokasi_id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="badge bg-red-500 text-white text-[10px] border-0 cursor-pointer" onclick="return confirm('Hapus lokasi ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="py-4 text-center text-muted">Belum ada data lokasi terbaru.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 mt-4">
        <div class="card table-card">
            <div class="card-header flex justify-between items-center">
                <h5>Pemeliharaan Aset Terbaru</h5>
                <a href="{{ route('pemeliharaanAset.index') }}" class="text-red-500 text-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-full text-sm text-left">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Bukti</th>
                                <th class="py-2 px-4 border-b">Tanggal</th>
                                <th class="py-2 px-4 border-b">Tindakan</th>
                                <th class="py-2 px-4 border-b">Biaya</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pemeliharaanTerbaru as $raw)
                            <tr>
                                <td class="py-2 px-4">
                                    @if($raw->media)
                                        <img src="{{ asset('storage/' . $raw->media) }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                    @else
                                        <span class="text-[10px] text-muted italic">No Media</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-muted">{{ $raw->tanggal->format('d/m/Y') }}</td>
                                <td class="py-2 px-4">
                                    <div class="font-bold">{{ Str::limit($raw->tindakan, 40) }}</div>
                                    <div class="text-[10px] text-muted">Pelaksana: {{ $raw->pelaksana }}</div>
                                </td>
                                <td class="py-2 px-4 text-success font-semibold">
                                    Rp {{ number_format($raw->biaya, 0, ',', '.') }}
                                </td>
                                <td class="py-2 px-4 flex gap-1">
                                    <a href="{{ route('pemeliharaanAset.edit', $raw->pemeliharaan_id) }}" class="badge bg-yellow-500 text-white text-[10px]">Edit</a>
                                    <form action="{{ route('pemeliharaanAset.destroy', $raw->pemeliharaan_id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="badge bg-red-500 text-white text-[10px] border-0 cursor-pointer" onclick="return confirm('Hapus riwayat ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="py-4 text-center text-muted">Belum ada riwayat pemeliharaan terbaru.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-span-12 mt-4">
        <div class="card table-card">
            <div class="card-header flex justify-between items-center">
                <h5>Mutasi Aset Terbaru</h5>
                <a href="{{ route('mutasiAset.index') }}" class="text-purple-500 text-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover w-full text-sm text-left">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID Aset</th>
                                <th class="py-2 px-4 border-b">Tanggal</th>
                                <th class="py-2 px-4 border-b">Jenis Mutasi</th>
                                <th class="py-2 px-4 border-b">Keterangan</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mutasiTerbaru as $mutasi)
                            <tr>
                                <td class="py-2 px-4 font-mono text-xs">{{ $mutasi->aset_id }}</td>
                                <td class="py-2 px-4 text-muted">{{ $mutasi->tanggal->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 font-semibold">{{ $mutasi->jenis_mutasi }}</td>
                                <td class="py-2 px-4 text-muted">{{ Str::limit($mutasi->keterangan, 50) }}</td>
                                <td class="py-2 px-4 flex gap-1">
                                    <a href="{{ route('mutasiAset.edit', $mutasi->mutasi_id) }}" class="badge bg-yellow-500 text-white text-[10px]">Edit</a>
                                    <form action="{{ route('mutasiAset.destroy', $mutasi->mutasi_id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="badge bg-red-500 text-white text-[10px] border-0 cursor-pointer" onclick="return confirm('Hapus mutasi ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="py-4 text-center text-muted">Belum ada riwayat mutasi terbaru.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection