@extends('layouts.admin.app')

@section('title', 'Kategori Aset')

@section('content')
<div class="container" style="padding-top: 190px; padding-bottom: 50px;">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-primary">Kategori Aset</h3>
            <p class="text-muted mb-0">Kelola data kategori aset Anda</p>
        </div>
        <a href="{{ route('kategori-aset.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
            <i class="fa fa-plus me-1"></i> Tambah Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse($kategori as $row)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="icon-box bg-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-box fa-lg"></i>
                            </div>
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                {{ $row->kode }}
                            </span>
                        </div>

                        <h5 class="card-title fw-bold text-dark">{{ $row->nama }}</h5>
                        <p class="card-text text-muted small">
                            {{ Str::limit($row->deskripsi, 80, '...') }}
                        </p>
                    </div>

                    <div class="card-footer bg-white border-top-0 pt-0 pb-4 d-flex justify-content-end">
                        <a href="{{ route('kategori-aset.edit', $row->kategori_id) }}" class="btn btn-sm btn-outline-warning rounded-circle me-1" style="width: 35px; height: 35px; padding-top: 6px;">
                            <i class="fa fa-pen"></i>
                        </a>

                        <form action="{{ route('kategori-aset.destroy', $row->kategori_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus kategori {{ $row->nama }}?')" class="btn btn-sm btn-outline-danger rounded-circle" style="width: 35px; height: 35px; padding-top: 6px;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            @endforelse
    </div>

</div>

<style>
    .hover-card {
        transition: transform 0.2s;
    }
    .hover-card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection