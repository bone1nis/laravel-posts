<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{

    public function __invoke(FilterRequest $filterRequest)
    {
        $data = $filterRequest->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => $data]);

        $page = $data["page"] ?? 1;
        $perPage = $data["per_page"] ?? 10;

        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return PostResource::collection($posts);

//        return view('post.index', ['posts' => $posts]);
    }
}
