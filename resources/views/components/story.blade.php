<section class="story">
  <h2>{{ $post->title }}</h2>
  <div class="story-content">
    <p class="story-text">{{ $post->text }}</p>
    <img class="story-img" src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->title}}">
  </div>
  <div class="story-content-under">
    <span class="story-author">{{ $post->author_name }}</span>
    <a class="" href="{{ url()->previous() }}">К списку</a>
  </div>
</section>