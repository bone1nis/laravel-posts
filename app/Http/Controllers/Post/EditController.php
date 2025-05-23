<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{

    public function __invoke(Post $post)
    {
        return view('post.edit', ['post' => $post, 'categories' => Category::all(), "tags" => Tag::all()]);
    }
}
