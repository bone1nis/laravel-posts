<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('post.index', ['posts' => $posts]);
    }

    public function create() {
        return view('post.create', ['categories' => Category::all(), "tags" => Tag::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            "image" => "nullable|string",
            "category_id" => "integer",
            "tags" => "nullable|array"
        ]);

        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        $post = Post::create($validated);
        $post->tags()->attach($tags);
        return redirect()->route('posts.index');
    }

    public function show(Post $post) {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post) {
        return view('post.edit', ['post' => $post, 'categories' => Category::all(), "tags" => Tag::all()]);
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            "image" => "nullable|string",
            "category_id" => "integer",
            "tags" => "nullable|array"
        ]);

        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        $post->update($validated);
        $post->tags()->sync($tags);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }

//    public function firstOrCreate() {
//        $post = Post::firstOrCreate([
//            "title" => "Title 4"
//        ], [
//            "title" => "Title 4",
//            "content" => "Content 4",
//            "image" => "https://picsum.photos/300/300",
//            "likes" => 3,
//            "is_published" => false
//        ]);
//
//        dump($post->toArray());
//
//        dd("finished");
//    }
//
//    public function updateOrCreate() {
//        $post = Post::updateOrCreate([
//            "title" => "updated Title 4"
//        ], [
//            "title" => "updated Title 4",
//            "content" => "updated Content 4",
//            "image" => "https://picsum.photos/400/400",
//            "likes" => 5000,
//            "is_published" => true
//        ]);
//
//        dd($post->toArray());
//    }
}
