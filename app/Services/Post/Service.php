<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $category = $data['category'];
            unset($data['category']);

            $tags = $data['tags'];
            unset($data['tags']);

            $post = Post::create($data);
            $post->tags()->attach($this->getTagsIds($tags));
            $post->category_id = $this->getCategoryId($category);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }


        return $post;
    }

    public function update(Post $post, $data)
    {

        try {
            DB::beginTransaction();
            $category = $data['category'] ?? null;
            $tags =  $data['tags'] ?? null;

            unset($data['tags'], $data['category']);

            $post->update($data);

            if ($category) {
                $post->category_id = $this->getCategoryIdsWithUpdate($category);
            }
            if ($tags) {
                $post->tags()->sync($this->getTagsIdsWithUpdate($tags));
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post->fresh();
//        $tags = $data['tags'] ?? [];
//        unset($data['tags']);
//
//        $post->update($data);
//        $post->tags()->sync($tags);
//        return $post->fresh();
    }

    private function getTagsIdsWithUpdate($tags)
    {
        $tagsIds = [];

        foreach ($tags as $tag) {
            if (isset($tag['id'])) {
                Tag::where("id", $tag["id"])->update(["title" => $tag["title"]]);
                $tagsIds[] = $tag["id"];
            } else {
                $newTag = Tag::create($tag);
                $tagsIds[] = $newTag->id;
            }
        }

        return $tagsIds;
    }

    private function getCategoryIdsWithUpdate($category)
    {
        if (isset($category['id'])) {
            Category::where("id", $category["id"])->update(["title" => $category["title"]]);
            return $category["id"];
        } else {
            return Category::create($category)->id;
        }
    }

    private function getTagsIds($tags)
    {
        $tagsIds = [];

        foreach ($tags as $tag) {
            $tag = !isset($tag["id"]) ? Tag::create($tag) : Tag::find($tag["id"]);
            $tagsIds[] = $tag->id;
        }

        return $tagsIds;
    }

    private function getCategoryId($category)
    {
        if (!isset($category['id'])) {
            return Category::create($category)->id;
        }
        return $category['id'];
    }
}
