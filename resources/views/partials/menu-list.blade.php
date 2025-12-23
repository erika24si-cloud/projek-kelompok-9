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

<li class="pc-item pc-caption">
  <label>UI Components</label>
  <i data-feather="feather"></i>
</li>


<li class="pc-item pc-caption">
  <label>Pages</label>
  <i data-feather="monitor"></i>
</li>

{{-- LOGIN --}}
<li class="pc-item pc-hasmenu">
  {{-- Karena ini halaman login, kita biarkan target="_blank" dan gunakan route jika Anda punya rute autentikasi --}}
  <a href="{{ route('login') }}" class="pc-link" target="_blank">
    <span class="pc-micon"> <i data-feather="lock"></i></span>
    <span class="pc-mtext">Login</span>
  </a>
</li>

{{-- REGISTER --}}
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

{{-- MENU LEVELS (Menggunakan '#' karena tidak ada tautan spesifik) --}}
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon"> <i data-feather="align-right"></i> </span>
    <span class="pc-mtext">Menu levels</span>
    <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
  </a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i class="ti ti-chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</li>
{{-- SAMPLE PAGE --}}
<li class="pc-item">
  <a href="{{ url('other/sample-page') }}" class="pc-link">
    <span class="pc-micon">
      <i data-feather="sidebar"></i>
    </span>
    <span class="pc-mtext">Sample page</span>
  </a>
</li>