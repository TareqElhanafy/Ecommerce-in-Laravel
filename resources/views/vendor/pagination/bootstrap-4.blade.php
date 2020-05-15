@if ($paginator->hasPages())

        <nav class="navigation align-center">

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)


                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <a  class="page-numbers bg-border-color current active"><span>{{ $page }}</span></a>

                        @else
                            <!-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> -->
                            <a href="{{ $url }}" class="page-numbers bg-border-color page-link"><span>{{ $page }}</span></a>

                        @endif
                    @endforeach
                @endif
            @endforeach

    </nav>
@endif
