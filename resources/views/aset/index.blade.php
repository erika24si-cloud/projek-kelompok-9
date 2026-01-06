@extends('layouts.admin.app')

@section('title', 'Aset')

@section('content')

    <!-- Spacer untuk navbar fixed-top -->
    <div style="height: 150px;"></div>

    <!-- Product Start -->
    <div class="container-fluid px-lg-5" style="padding-top: 20px; padding-bottom: 3rem;">
        <div class="mb-5">
            <div class="d-flex flex-column align-items-start ms-4 ms-lg-0">
                <h1 class="display-6 mb-2" style="font-size: 2rem;">Aset</h1>
                <p class="text-muted">Data aset yang telah diinput</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('update'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('delete'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Filter Kondisi -->
        <div class="mb-4 ms-4 ms-lg-0">
            <form method="GET" action="{{ route('aset.index') }}" class="d-inline-flex align-items-center gap-2">
                <label for="kondisi" class="form-label mb-0">Filter Kondisi:</label>
                <select name="kondisi" id="kondisi" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                    <option value="all" {{ !$kondisiFilter || $kondisiFilter == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="baik" {{ $kondisiFilter == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ $kondisiFilter == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="perbaikan" {{ $kondisiFilter == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                </select>
            </form>
        </div>

        <div class="container">
            <div class="row g-4">
                @forelse($dataaset as $row)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            @if($row->media)
                                <img src="{{ asset('storage/' . $row->media) }}" alt="{{ $row->nama_aset }}" class="card-image" style="object-fit: cover; width: 100%; height: 160px;">
                            @else
                                <div class="card-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; height: 160px;">
                                    <i class="fa fa-image fa-4x text-white"></i>
                                </div>
                            @endif
                            <div class="card-content">
                                <div class="card-header">
                                    <span class="category-badge">{{ $row->kategori->nama ?? 'Tidak ada kategori' }}</span>
                                    <span class="asset-code">#{{ $row->kode_aset }}</span>
                                </div>
                                <p class="card-description">
                                    <strong>{{ $row->nama_aset }}</strong><br>
                                    Kondisi: 
                                    <span class="badge 
                                        @if($row->kondisi == 'baik') bg-success
                                        @elseif($row->kondisi == 'rusak') bg-danger
                                        @else bg-warning
                                        @endif">
                                        {{ ucfirst($row->kondisi) }}
                                    </span><br>
                                    Nilai: Rp {{ number_format($row->nilai_perolehan, 0, ',', '.') }}<br>
                                    Tgl Perolehan: {{ \Carbon\Carbon::parse($row->tgl_perolehan)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fa fa-box fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada data aset</h5>
                            <p class="text-muted">Data aset akan muncul di sini setelah diinput</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($dataaset->hasPages())
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-start mt-4">
                            {{ $dataaset->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Product End -->

@endsection

