<section class="stories">
  <ul class="stories-list">
    @foreach ($posts as $post)
    <li class="stories-item">
      <h2>{{ $post->title }}</h2>
      <ul class="stories-tags">
        @foreach($post->tags as $tag)
        <a href="{{ route('showByTag', ['tag' => $tag->name ]) }}">
          <li class="stories-tags-item">{{ $tag->name }}</li>
        </a>
        @endforeach
      </ul>
      <div class="stories-content-box">
        <div class="stories-img-box">
          <img class="stories-img" src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->title }}">
        </div>
        <div class="stories-text-box">
          <div class="stories-text-container">
            <p class="stories-text">{{ $post->text }}</p>
          </div>
          <a href="{{ url($linkPrefix . $post->id) }}" class="main-link">Читать</a>
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</section>