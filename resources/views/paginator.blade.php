@if ($paginator->lastPage() > 1)
    <ul class="pagination-list">
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="pagination-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $paginator->url($i) }}" class="pagination-link">{{ $i }}</a>
            </li>
        @endfor
    </ul>
@endif