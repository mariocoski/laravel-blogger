@if ($paginator->hasPages())
 <div class="ui content">
   @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="ui orange fluid button" rel="next">Next page</a>
        @elseif(!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" class="ui orange fluid button" rel="next">Previous page</a>
        @endif
        <div class="ui content pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <div class="disabled"><span>&laquo;</span></div>
        @else
           <a  class="item" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
               <div class="disabled item">
                 {{ $element }}
               </div>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active item">{{ $page }}</a>
                    @else
                         <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
          <a href="{{ $paginator->nextPageUrl() }}" class="item" rel="next">&raquo;</a>
        @else
           <div class="item disabled"><span>&raquo;</span></div>
        @endif
    </div>
    </div>
</div>
@endif
