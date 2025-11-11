<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        $tags = ['#tag1', '#tag2', '#tag3'];
        return view('post.create', ['tags' => $tags]);
    }

    public function add(Request $request)
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
