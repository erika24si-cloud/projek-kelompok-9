<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header flex items-center py-4 px-6 h-header-height">
      <a href="{{ route('dashboard') }}" class="b-brand flex items-center gap-3">
        <img src="{{ asset('assets/images/logo-white.svg') }}" class="img-fluid logo logo-lg" alt="logo" />
        <img src="{{ asset('assets/images/favicon.svg') }}" class="img-fluid logo logo-sm" alt="logo" />
      </a>
    </div>
    <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Navigation</label>
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
              <i data-feather="map-pin"></i>
            </span>
            <span class="pc-mtext">Aset</span>
          </a>
        </li>


        <li class="pc-item pc-caption">
          <label>Pages</label>
          <i data-feather="monitor"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="{{ route('login') }}" class="pc-link" target="_blank">
            <span class="pc-micon"> <i data-feather="lock"></i></span>
            <span class="pc-mtext">Login</span>
          </a>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="{{ route('register') }}" class="pc-link" target="_blank">
            <span class="pc-micon"> <i data-feather="user-plus"></i></span>
            <span class="pc-mtext">Register</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Other</label>
          <i data-feather="sidebar"></i>
        </li>

        <li class="pc-item">
  <a href="{{ route('sample.page') }}" class="pc-link">
    <span class="pc-micon">
      <i data-feather="sidebar"></i>
    </span>
            <span class="pc-mtext">Sample page</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
