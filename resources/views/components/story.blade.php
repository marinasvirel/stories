<section class="story">
  <h1>{{ $post->title }}</h1>
  <div class="story-content">
    <img class="story-img" src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->title}}">
    <p class="story-text">{{ $post->text }}</p>
  </div>
  <div class="story-content-under">
    <span class="story-author">{{ $post->author_name }}</span>
    <a class="" href="{{ url()->previous() }}">К списку</a>
  </div>
</section>