<div class="mt-4 mb-4">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item prev disabled">
                        <a href="javascript:;" class="page-link">
                            <i class="tf-icon bx bx-chevrons-left"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item prev">
                        <a href="javascript:;" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
                            <i class="tf-icon bx bx-chevrons-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <a class="page-link">{{ $element }}</a>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" wire:click="gotoPage({{ $page }})" href="javascript:;">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" wire:click="gotoPage({{ $page }})" href="javascript:;">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item next">
                        <a href="javascript:;" class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next">
                            <i class="tf-icon bx bx-chevrons-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item next disabled">
                        <a href="javascript:;" class="page-link">
                            <i class="tf-icon bx bx-chevrons-right"></i>
                        </a>
                    </li>
                @endif
                </ul>
        </nav>
    @endif
</div>
