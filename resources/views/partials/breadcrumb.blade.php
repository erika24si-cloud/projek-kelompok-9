<div class="page-header">
  <div class="page-block">
    <div class="page-header-title">
      <h5 class="mb-0 font-medium">@yield('title', 'Default')</h5> {{-- Mengganti teks statis dengan Judul Halaman --}}
    </div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> {{-- Tautan Dashboard --}}
      <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
      <li class="breadcrumb-item" aria-current="page">@yield('title', 'Default')</li> {{-- Mengganti teks statis --}}
    </ul>
  </div>
</div>