<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        //validate the request
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10'
        ]);

        $post->update($validated);

        return to_route('admin');
    }
    public function destroy(Post $post)
    {

        $post->delete();

        return to_route('admin');
    }
}
