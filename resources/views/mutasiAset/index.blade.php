@extends('layouts.app')

@section('title', 'Daftar Riwayat Mutasi Aset')

@section('content')

<div class="grid grid-cols-12 gap-x-6">

    <div class="col-span-12 mb-4 d-flex justify-content-between align-items-center">

        <div style="width: 50%;">
            <form method="GET" action="{{ route('mutasiAset.index') }}" class="d-flex align-items-center gap-2">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari Tindakan atau Pelaksana..."
                    value="{{ request('search') }}"
                    style="width: 250px;"
                >
                <br>
                <button type="submit" class="btn btn-secondary">Cari</button>

                @if (request('search'))
                    <a href="{{ route('mutasiAset.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                @endif
            </form>
        </div>

        <div class="text-right">
            <a href="{{ route('mutasiAset.create') }}" class="btn btn-primary">Tambah Riwayat Baru</a>
        </div>
    </div>

    <div class="col-span-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Riwayat Mutasi Aset</h5>
            </div>


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Aset</th>
                                <th>Tanggal</th>
                                <th>Jenis Mutasi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mutasiAset as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->aset_id }}</td>
                                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $item->jenis_mutasi }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('mutasiAset.edit', $item->mutasi_id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('mutasiAset.destroy', $item->mutasi_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat mutasi pada tanggal {{ $item->tanggal->format('d/m/Y') }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada riwayat Mutasi Aset yang tersimpan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 mt-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                @if ($mutasiAset instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $mutasiAset->links() }}
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
