<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class  PostController extends Controller
{
    public function update(Request $request, Post $post)
    {
        if (auth()->id() !== $post['user_id']) {
            return redirect('/');
        }

        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['body'] = strip_tags($validatedData['body']);

        $post->update($validatedData);
        return redirect('/');
    }

    public function show(Post $post)
    {
        if (auth()->id() !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['body'] = strip_tags($validatedData['body']);
        $validatedData['user_id'] = auth()->id();
        Post::create($validatedData);
        return redirect('/');
    }
}

