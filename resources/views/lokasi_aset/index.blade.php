@extends('layouts.admin.app')

@section('title', 'Lokasi Aset')

@section('content')

    <!-- Spacer untuk navbar fixed-top -->
    <div style="height: 150px;"></div>

    <!-- Product Start -->
    <div class="container-fluid px-lg-5" style="padding-top: 20px; padding-bottom: 3rem;">
        <div class="mb-5">
            <div class="d-flex flex-column align-items-start ms-4 ms-lg-0">
                <h1 class="display-6 mb-2" style="font-size: 2rem;">Lokasi Aset</h1>
                <p class="text-muted">Data lokasi aset yang telah diinput</p>
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

        <!-- Filter Aset -->
        <div class="mb-4 ms-4 ms-lg-0">
            <form method="GET" action="{{ route('lokasi-aset.index') }}" class="d-inline-flex align-items-center gap-2">
                <label for="aset_id" class="form-label mb-0">Filter Aset:</label>
                <select name="aset_id" id="aset_id" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                    <option value="all" {{ !$asetIdFilter || $asetIdFilter == 'all' ? 'selected' : '' }}>Semua</option>
                    @foreach(\App\Models\aset::all() as $aset)
                        <option value="{{ $aset->aset_id }}" {{ $asetIdFilter == $aset->aset_id ? 'selected' : '' }}>
                            {{ $aset->nama_aset }} ({{ $aset->kode_aset }})
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="container">
            <div class="row g-4">
                @forelse($datalokasiaset as $row)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            @if($row->media)
                                <img src="{{ asset('storage/' . $row->media) }}" alt="{{ $row->lokasi_text }}" class="card-image" style="object-fit: cover; width: 100%; height: 160px;">
                            @else
                                <div class="card-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; height: 160px;">
                                    <i class="fa fa-map-marker-alt fa-4x text-white"></i>
                                </div>
                            @endif
                            <div class="card-content">
                                <div class="card-header">
                                    <span class="category-badge">{{ $row->aset->nama_aset ?? 'Tidak ada aset' }}</span>
                                    <span class="asset-code">#{{ $row->aset->kode_aset ?? '-' }}</span>
                                </div>
                                <p class="card-description">
                                    <strong>{{ $row->lokasi_text }}</strong><br>
                                    Keterangan: {{ Str::limit($row->keterangan, 50, '...') }}<br>
                                    @if($row->rt || $row->rw)
                                        RT/RW: {{ $row->rt ?? '-' }}/{{ $row->rw ?? '-' }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fa fa-map-marker-alt fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada data lokasi aset</h5>
                            <p class="text-muted">Data lokasi aset akan muncul di sini setelah diinput</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($datalokasiaset->hasPages())
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-start mt-4">
                            {{ $datalokasiaset->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Product End -->

@endsection

