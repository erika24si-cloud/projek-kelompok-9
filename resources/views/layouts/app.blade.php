<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    data-pc-preset="preset-1" 
    data-pc-sidebar-caption="true" 
    data-pc-direction="ltr" 
    dir="ltr" 
    data-pc-theme="light" 
    id="main-html-tag"> 

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title', 'Default') | Datta Able Dashboard</title>

    @include('partials.head-page-meta')
    @include('partials.head-css') 

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
            

            @yield('content')
            
        </div>
    </div>
    @include('partials.footer-block')
    
   @include('partials.footer-js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ Session::get('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        @if(Session::has('update'))
            Swal.fire({
                icon: 'info',
                title: 'Diperbarui!',
                text: "{{ Session::get('update') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        @if(Session::has('delete'))
            Swal.fire({
                icon: 'warning',
                title: 'Dihapus!',
                text: "{{ Session::get('delete') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @endif

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