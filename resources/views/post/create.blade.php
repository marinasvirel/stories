@extends('layouts.main')
@section('title', 'Интересные истории | Добавить историю')
@section('content')
<form action="{{ route('add') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}" autocorrect autofocus>
  <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
  <input type="text" name="title" placeholder="Заголовок" value="{{ old('title') }}">
  <textarea name="text" id="" autocorrect placeholder="Текст"></textarea>
  <input type="file" name="img" accept="image/*">
  <textarea id="target-textarea" placeholder="Тэги через запятую" name="tags"></textarea>
  <ul>
    @foreach($tags as $tag)
    <li class="text-item">{{ $tag }}</li>
    @endforeach
  </ul>
  <button type="submit">Добавить</button>
</form>
<script>
  // 1. Получаем ссылки на все текстовые элементы и на целевое поле
  const textItems = document.querySelectorAll('.text-item');
  const targetTextarea = document.getElementById('target-textarea');

  // 2. Добавляем обработчик события 'click' к каждому текстовому элементу
  textItems.forEach(item => {
    item.addEventListener('click', function() {
      // 3. Получаем текстовое содержимое элемента, по которому кликнули
      const clickedText = this.textContent;

      // 4. Добавляем этот текст в текстовое поле (с новой строки)
      // Используем += для добавления, а не замены текста
      targetTextarea.value += clickedText + ', ';
    });
  });
</script>
@endsection