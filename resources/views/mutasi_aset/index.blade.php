@extends('layouts.admin.app')

@section('title', 'Mutasi Aset')

@section('content')

    <!-- Spacer untuk navbar fixed-top -->
    <div style="height: 150px;"></div>

    <!-- Product Start -->
    <div class="container-fluid px-lg-5" style="padding-top: 20px; padding-bottom: 3rem;">
        <div class="mb-5">
            <div class="d-flex flex-column align-items-start ms-4 ms-lg-0">
                <h1 class="display-6 mb-2" style="font-size: 2rem;">Mutasi Aset</h1>
                <p class="text-muted">Data mutasi aset yang telah diinput</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('delete'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container">
            <div class="row g-4">
                @forelse($mutasiAset as $row)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; height: 160px;">
                                <i class="fa fa-exchange-alt fa-4x text-white"></i>
                            </div>
                            <div class="card-content">
                                <div class="card-header">
                                    <span class="category-badge">{{ $row->aset->nama_aset ?? 'Tidak ada aset' }}</span>
                                    <span class="asset-code">#{{ $row->aset->kode_aset ?? '-' }}</span>
                                </div>
                                <p class="card-description">
                                    <strong>Jenis Mutasi: {{ $row->jenis_mutasi }}</strong><br>
                                    Tanggal: {{ \Carbon\Carbon::parse($row->tanggal)->format('d/m/Y') }}<br>
                                    Keterangan: {{ Str::limit($row->keterangan, 60, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fa fa-exchange-alt fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada data mutasi aset</h5>
                            <p class="text-muted">Data mutasi aset akan muncul di sini setelah diinput</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($mutasiAset->hasPages())
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-start mt-4">
                            {{ $mutasiAset->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Product End -->

@endsection

