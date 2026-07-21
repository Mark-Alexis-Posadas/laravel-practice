@props(['paginator'])

@if ($paginator->hasPages())
    <nav class="d-flex justify-content-between align-items-center mt-4">
        {{-- Record Counter --}}
        <div class="text-muted small">
            Showing 
            <span class="fw-semibold">{{ $paginator->firstItem() ?? 0 }}</span> 
            to 
            <span class="fw-semibold">{{ $paginator->lastItem() ?? 0 }}</span> 
            of 
            <span class="fw-semibold">{{ $paginator->total() }}</span> entries
        </div>

        {{-- Page Buttons --}}
        <ul class="pagination pagination-sm m-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Page Numbers --}}
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif