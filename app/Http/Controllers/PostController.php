<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function createView()
    {
        $tagsAll = Tag::all();
        $tags = [];
        foreach ($tagsAll as $value) {
            $tags[] = $value['name'];
        }
        return view('post.create', ['tags' => $tags]);
    }

    public function create(Request $request)
    {
        // dump($request->input('tags'));
        dump($request->all());
    }

    public function read()
    {
        $posts = Post::with('tags')->get();
        return view('home', ['posts' => $posts]);
    }
}
