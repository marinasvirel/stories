@if ($paginator->lastPage() > 1)
<nav class="my-custom-pagination-container">
  <ul class="pagination-list">
    @foreach ($elements as $element)
    @if (is_array($element))
    @foreach ($element as $page => $url)

    {{-- !!! Вот здесь ключевая логика !!! --}}
    @if ($page == $paginator->currentPage())
    {{-- Активная страница: применяем класс 'active-page' --}}
    <li class="active-page">
      <a href="#" class="pagination-link current">{{ $page }}</a>
    </li>
    @else
    {{-- Неактивная страница --}}
    <li>
      <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
    </li>
    @endif

    @endforeach
    @endif
    @endforeach
  </ul>
</nav>
@endif