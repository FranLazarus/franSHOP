@if($paginator->hasPages())
<ul class="pagination">

    <!--前一頁-->
    @if($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link"><span>&laquo;</span></a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><span>&laquo;</span></a>
        </li>
    @endif

    <!--頁面元件-->
    @foreach($elements as $element)

        <!--若只是顯示搜尋結果-->
        @if(is_string($element))
            <li class="page-item disabled">
                <a class="page-link"><span>{{ $element }}</span></a>
            </li>
        @endif

        @if(is_array($element))
            @foreach($element as $page=>$url)
                @if($page == $paginator->currentPage())
                    <li class="page-item active">
                        <a class="page-link"><span>{{ $page }}</span></a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif

    @endforeach

    <!--下一頁-->
    @if($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next"><span>&raquo;</span></a>
        </li>
    @else
        <li class="page-item disabled">
            <a class="page-link"><span>&raquo;</span></a>
        </li>
    @endif

</ul>
    <!--加那麼多span幹嘛?我要把它們拿掉-->
    <!--if也要少一組-->
@endif