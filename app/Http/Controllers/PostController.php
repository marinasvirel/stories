<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function createView()
    {
        $tags = Tag::all();
        return view('post.create', compact('tags'));
    }

    public function create(PostRequest $request)
    {
        $data = $request->validated();

        // 1. Инициализируем менеджер изображений V3
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('img')) {
            $imageFile = $request->file('img');

            // Генерируем уникальное имя файла с расширением
            $extension = $imageFile->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;

            // Базовый путь для основного изображения
            $basePath = 'uploads/' . $fileName;

            // --- Работа с изображением 587x587 ---
            // Читаем изображение из файла запроса
            $image587 = $manager->read($imageFile->getRealPath());
            // Обрезаем и подгоняем размер (аналог fit() в V2)
            $image587->cover(587, 587);

            // Сохраняем основную версию на диск 'public'
            Storage::disk('public')->put($basePath, $image587->encode());

            // --- Работа с изображением 223x223 (миниатюра) ---
            $thumbName = 'thumb_' . $fileName;
            $thumbPath = 'uploads/' . $thumbName;

            // Читаем изображение еще раз (чтобы не использовать уже измененный объект image587)
            $image223 = $manager->read($imageFile->getRealPath());
            $image223->cover(223, 223);

            // Сохраняем миниатюру на диск 'public'
            Storage::disk('public')->put($thumbPath, $image223->encode());

            // В базу данных сохраняем путь к основному изображению
            $data['img'] = $basePath;
            // При необходимости сохранения пути к миниатюре в отдельное поле:
            $data['img_thumb'] = $thumbPath;
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
        $posts = Post::with('tags')
            ->where('is_publish', true)
            ->paginate(3);
        $tags = Tag::all();
        return view('home', ['posts' => $posts, 'tags' => $tags]);
    }

    public function show(Post $post)
    {
        return view('post.read', compact('post'));
    }

    public function readModer()
    {
        $posts = Post::with('tags')
            ->where('is_publish', false)
            ->paginate(3);
        return view('user.dashboard', ['posts' => $posts]);
    }

    public function readDetailModer(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        return view('user.moderation', compact('post'));
    }

    public function showByTag($tag)
    {

        $posts = Post::with('tags')
            ->where('is_publish', true)
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('name', $tag);
            })
            ->paginate(3);

        return view('post.tag', ['posts' => $posts, 'tag' => $tag]);
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
}
