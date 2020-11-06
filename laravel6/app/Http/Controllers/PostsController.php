<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    // return all posts
    public function index()
    {
        return Post::all();
    }

    // return a single post based on the id of the post
    public function show(Post $post) {
        return $post;
    }

    // return the created post with a 201 status code
    // 201 means Content Created
    public function store(Request $request) {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    // return the updated post with the default 200 status code
    public function update(Request $request, Post $post) {
        $post->update($request->all());
        return response()->json($post);
    }

    // return null with a 204 status code
    // 204 means No Content
    public function delete(Post $post) {
        $post->delete();
        return response()->json(null, 204);
    }
}
