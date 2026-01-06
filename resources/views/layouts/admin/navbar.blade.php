<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, Rumbai, IDN</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>aset@example.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    @php
                    // Ambil nama route yang sedang aktif
                    $routeSekarang = Route::currentRouteName();
                    
                    // Cek apakah menu Home aktif?
                    // Aktif jika route = 'dashboard' atau URL = '/'
                    $homeAktif = false;
                    if ($routeSekarang == 'dashboard' || request()->is('/')) {
                        $homeAktif = true;
                    }
                    
                    // Cek apakah menu Kategori Aset aktif?
                    // Aktif jika route mengandung kata 'kategori-aset'
                    $kategoriAktif = false;
                    if (str_contains($routeSekarang, 'kategori-aset')) {
                        $kategoriAktif = true;
                    }
                    
                    // Cek apakah menu Aset aktif?
                    // Aktif jika route = 'aset.index' atau 'aset.create' atau 'aset.edit'
                    $asetAktif = false;
                    if ($routeSekarang == 'aset.index' || 
                        $routeSekarang == 'aset.create' || 
                        $routeSekarang == 'aset.edit' || 
                        $routeSekarang == 'aset.show') {
                        $asetAktif = true;
                    }
                    
                    // Cek apakah menu Lokasi Aset aktif?
                    $lokasiAktif = false;
                    if (str_contains($routeSekarang, 'lokasi-aset')) {
                        $lokasiAktif = true;
                    }
                    
                    // Cek apakah menu Pemeliharaan Aset aktif?
                    $pemeliharaanAktif = false;
                    if (str_contains($routeSekarang, 'pemeliharaan-aset')) {
                        $pemeliharaanAktif = true;
                    }
                    
                    // Cek apakah menu Mutasi Aset aktif?
                    $mutasiAktif = false;
                    if (str_contains($routeSekarang, 'mutasi-aset')) {
                        $mutasiAktif = true;
                    }
                @endphp
    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        
        <div class="d-flex flex-column align-items-start ms-4 ms-lg-0">
            
            <a href="#" class="navbar-brand p-0">
                <h1 class="fw-bold text-primary m-0">In<span class="text-secondary">venta</span>ris</h1>
            </a>

        </div>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                
                {{-- Menu Home --}}
                <a class="nav-link {{ $homeAktif ? 'active' : '' }}" href="{{ route('dashboard') }}">Home</a>
                
                {{-- Menu Kategori Aset --}}
                <a class="nav-link {{ $kategoriAktif ? 'active' : '' }}" href="{{ route('kategori-aset.index') }}">Kategori Aset</a>
                
                {{-- Menu Aset --}}
                <a class="nav-link {{ $asetAktif ? 'active' : '' }}" href="{{ route('aset.index') }}">Aset</a>
                
                {{-- Menu Lokasi Aset --}}
                <a class="nav-link {{ $lokasiAktif ? 'active' : '' }}" href="{{ route('lokasi-aset.index') }}">Lokasi Aset</a>
                
                {{-- Menu Pemeliharaan Aset --}}
                <a class="nav-link {{ $pemeliharaanAktif ? 'active' : '' }}" href="{{ route('pemeliharaan-aset.index') }}">Pemeliharaan Aset</a>
                
                {{-- Menu Mutasi Aset --}}
                <a class="nav-link {{ $mutasiAktif ? 'active' : '' }}" href="{{ route('mutasi-aset.index') }}">Mutasi Aset</a> 
            </div>
        </div>
    </nav>
</div>