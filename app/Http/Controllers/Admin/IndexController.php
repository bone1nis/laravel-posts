<?php

namespace App\Http\Controllers\Admin;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController
{

    public function __invoke(FilterRequest $filterRequest)
    {
        $data = $filterRequest->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => $data]);

        $posts = Post::filter($filter)->paginate(2);

        return view('admin.post.index' , ['posts' => $posts]);
    }
}
