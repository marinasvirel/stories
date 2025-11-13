<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function createView()
    {
        $tags = Tag::all();
        return view('post.create', compact('tags'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'existing_tags' => 'array',
            'existing_tags.*' => 'exists:tags,id',
            'new_tags' => 'nullable|string|max:255',
        ]);

        //Убедитесь, что ваше приложение может сохранять файлы в публично доступном месте. По умолчанию файлы сохраняются в storage/app/public. Вам нужно создать символическую ссылку, чтобы сделать их доступными из веба:
        // php artisan storage:link 
        if ($request->hasFile('img')) {
            // отправляем файл в папку uploads
            $imagePath = $request->file('img')->store('uploads', 'public');
            // добавляем в общий массив
            $data['img'] = $imagePath;
        }

        $post = Post::create($data);

        $tagIdsToAttach = $request->input('existing_tags', []);

        // 2. Обрабатываем новые теги из текстового поля
        if ($request->filled('new_tags')) {
            // Разбиваем строку по запятым, обрезаем пробелы, убираем пустые значения
            $newTagNames = array_filter(array_map('trim', explode(',', $request->new_tags)));

            foreach ($newTagNames as $tagName) {
                // Ищем существующий тег или создаем новый (firstOrCreate)
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                // Добавляем ID этого тега в общий массив
                $tagIdsToAttach[] = $tag->id;
            }
        }

        // Убедимся, что ID уникальны, прежде чем синхронизировать
        $tagIdsToAttach = array_unique($tagIdsToAttach);

        // 3. Синхронизируем все теги с постом
        $post->tags()->sync($tagIdsToAttach);

        return redirect(route('createView'));
    }

    public function read()
    {
        $posts = $this->posts(true);
        return view('home', ['posts' => $posts]);
    }

    public function readDetail($id)
    {
        $post = Post::findOrFail($id);
        return view('post.read', ['post' => $post]);
    }

    public function readModer()
    {
        $posts = $this->posts(false);
        return view('user.dashboard', ['posts' => $posts]);
    }

    public function readDetailModer($id)
    {
        $post = Post::findOrFail($id);
        return view('user.moderation', ['post' => $post]);
    }

    public function moderationPost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($request->input('action') === 'publish') {
            $post->update(['is_publish' => true]);
            return redirect()->route('readModer');
        }

        if ($request->input('action') === 'reject') {
            $post->delete();
            return redirect()->route('readModer');
        }
    }

    public function publish() {}

    public function reject() {}

    private function posts($arg)
    {
        $postsAll = Post::with('tags')->get();
        $posts = [];
        foreach ($postsAll as $key => $value) {
            if ($value->is_publish == $arg) {
                $posts[] = $value;
            }
        }
        return $posts;
    }
}
