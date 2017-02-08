@if ($paginator->hasPages())
 <div class="ui segments">
    @if($paginator->hasMorePages())
    <div class="ui segment">
         <a class="ui primary fluid button" href="{{ $paginator->nextPageUrl() }}" rel="next">Next Page</a>
    </div>
    @endif
    <div class="ui segment">
        <div class="ui pagination menu mini">
            <!-- First Page Link -->
            @if ($paginator->currentPage() != 1 && $paginator->lastPage() >= 5)
                <a class="item" href="{{ $paginator->url($paginator->url(1)) }}" >
                    &laquo;
                </a>
            @else
                <div class="item disabled">&laquo;</div>
            @endif

            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <div class="item disabled">&#8249;</div>
            @else
                <a class="item" href="{{ $paginator->previousPageUrl() }}" rel="prev">&#8249;</a>
            @endif

            <!-- Array Of Links -->
            @for($i = max($paginator->currentPage()-2, 1); $i <= min(max($paginator->currentPage()-2, 1)+4,$paginator->lastPage()); $i++)
                <a class="item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">
                    {{ $i }}
                </a>
             @endfor

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <a class="item" href="{{ $paginator->nextPageUrl() }}" rel="next">&#8250;</a>
            @else
                <div class="item disabled">&#8250;</div>
            @endif

            <!-- Last Page Link -->
            @if ($paginator->currentPage() != $paginator->lastPage() && $paginator->lastPage() >= 5)
                <a class="item" href="{{ $paginator->url($paginator->lastPage()) }}" >
                    &raquo;
                </a>
            @else
                <div class="item disabled">&raquo;</div>
            @endif
        </div>
    </div>

</div>
@endif
