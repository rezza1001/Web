@if ($paginator->hasPages())
{{--     <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="button LoadMore">Load More</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul> --}}
    <div class="pagingbox">
     <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="button LoadMore">LOAD MORE</a>
    </div>
@endif
