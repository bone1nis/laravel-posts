<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{

    public function __invoke()
    {
        return view('post.create', ['categories' => Category::all(), "tags" => Tag::all()]);
    }
}
