<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str; // Импортируем фасад Str

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'author_name',
        'author_email',
        'title',
        'slug',
        'text',
        'img',
        'img_thumb',
        'is_publish',
    ];

    protected static function boot()
    {
        parent::boot();

        // Прослушиваем событие 'creating' (при создании новой записи)
        static::creating(function ($post) {
            $post->slug = $post->generateUniqueSlug($post->title);
        });

        // Опционально: Прослушиваем событие 'updating' (при обновлении)
        static::updating(function ($post) {
            // Если вы хотите обновлять слаг при изменении заголовка
            if ($post->isDirty('title')) {
                $post->slug = $post->generateUniqueSlug($post->title);
            }
        });
    }

    /**
     * Генерирует уникальный слаг из строки.
     */
    public function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        // Проверяем уникальность слага в базе данных
        while (static::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        return $slug;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
