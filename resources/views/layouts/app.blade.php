<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    data-pc-preset="preset-1" 
    data-pc-sidebar-caption="true" 
    data-pc-direction="ltr" 
    dir="ltr" 
    data-pc-theme="light" 
    id="main-html-tag"> {{-- Tambah ID agar mudah diakses JS --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title', 'Default') | Datta Able Dashboard</title>

    @include('partials.head-page-meta')
    @include('partials.head-css') 

    {{-- SCRIPT 1: Jalankan secepat mungkin di Head untuk mencegah 'Flash of Light Mode' --}}
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-pc-theme', savedTheme);
        })();
    </script>

    @yield('styles') 
</head>

<body>
    
    @include('partials.loader')
    @include('partials.sidebar')
    @include('partials.header')
    
    <div class="pc-container">
        <div class="pc-content">

            @include('partials.breadcrumb')
            
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(Session::has('update'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ Session::get('update') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(Session::has('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
            
        </div>
    </div>
    @include('partials.footer-block')
    
    @include('partials.footer-js')

    <script>
        function changeTheme(theme) {
            localStorage.setItem('theme', theme);
            
            document.documentElement.setAttribute('data-pc-theme', theme);
            
            if (typeof layout_change === 'function') {
                layout_change(theme);
            }
            
            if (theme === 'dark') {
                if (typeof layout_sidebar_change === 'function') layout_sidebar_change('dark');
            }
        }
    </script>

    @stack('scripts')
    
</body>
</html>