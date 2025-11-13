<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'author_name',
        'author_email',
        'title',
        'text',
        'img',
        'is_publish',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
