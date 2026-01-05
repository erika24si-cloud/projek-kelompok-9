<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header flex items-center py-4 px-6 h-header-height">
      <a href="{{ route('dashboard') }}" class="b-brand flex items-center gap-3">
   <div class="b-bg">
       <i class="feather icon-trending-up text-white"></i>
   </div>
   <div class="flex flex-col">
  <span class="text-white font-semibold text-lg leading-tight">Bina Desa</span>
  <span class="text-white/70 text-xs font-semibold">Sistem Inventaris dan Aset</span>
</div>
   
</a>
    </div>
    <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Home</label>
        </li>
        <li class="pc-item">
          <a href="{{ route('dashboard') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="home"></i>
            </span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('warga.index') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="eye"></i>
            </span>
            <span class="pc-mtext">Warga</span>
          </a>
        </li>


        <li class="pc-item">
          <a href="{{ route('kategoriAset.index') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="briefcase"></i>
            </span>
            <span class="pc-mtext">Kategori Aset</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('aset.index') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="slack"></i>
            </span>
            <span class="pc-mtext">Aset</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('lokasiAset.index') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="map-pin"></i>
            </span>
            <span class="pc-mtext">Lokasi Aset</span>
          </a>
        </li>

         <li class="pc-item">
          <a href="{{ route('pemeliharaanAset.index') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="settings"></i>
            </span>
            <span class="pc-mtext">Pemeliharaan Aset</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('mutasiAset.index') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="repeat"></i>
            </span>
            <span class="pc-mtext">Mutasi Aset</span>
          </a>
        </li>

        
        </li>
      </ul>
    </div>
  </div>
</nav>
