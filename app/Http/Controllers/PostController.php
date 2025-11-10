<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $tags = ['#tag1', '#tag2', '#tag3'];
        return view('post.create', ['tags'=>$tags]);
    }

    public function add(Request $request)
    {
        // dump($request->input('tags'));
        dump($request->all());
    }
}
