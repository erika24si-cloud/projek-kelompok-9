@if ($paginator->hasPages())
    {{-- Navigasi Simple Pagination dalam format Button Group (btn-group) --}}
    <nav aria-label="Simple Pagination">
        
        {{-- Menggunakan d-flex justify-content-center agar posisi di tengah --}}
        <div class="d-flex justify-content-center">
            
            {{-- Tombol Grup Bootstrap untuk membuat tombol menyatu --}}
            <div class="btn-group" role="group">
                
                {{-- Previous Page Button/Link --}}
                @if ($paginator->onFirstPage())
                    <button type="button" class="btn btn-outline-secondary" disabled>
                        &laquo; Previous
                    </button>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-primary" rel="prev">
                        &laquo; Previous
                    </a>
                @endif
                
                {{-- Next Page Button/Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-primary" rel="next">
                        Next &raquo;
                    </a>
                @else
                    <button type="button" class="btn btn-outline-secondary" disabled>
                        Next &raquo;
                    </button>
                @endif

            </div>
        </div>
        
    </nav>
@endif