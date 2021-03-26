@if ($paginator->hasPages())
    <div class="product__pagination">

        @if ($paginator->onFirstPage())
            <a class="disabled"><i class="fa fa-long-arrow-left"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-long-arrow-left"></i></a>
        @endif

        @foreach ($elements as $element)
           
            @if (is_string($element))
                <a class="disabled" href="#">{{ $element }}</a>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active" href="#">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-long-arrow-right"></i></a>
        @else
            <a class="disabled"><i class="fa fa-long-arrow-right"></i></a>
        @endif

    </div>

@endif