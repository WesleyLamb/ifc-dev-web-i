<?php

namespace App\Repositories;

use App\DTO\StorePostDTO;
use App\DTO\UpdatePostDTO;
use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function index(): Collection
    {
        return Post::all();
    }

    public function store(StorePostDTO $data): Post
    {
        $post = new Post();

        $post->title = $data->title;
        $post->content = $data->content;
        $post->slug = $data->slug;
        $post->save();

        return $post->refresh();
    }

    public function getBySlugOrFail(string $slug): Post
    {
        return Post::where('slug', $slug)->firstOrFail();
    }

    public function getBySlug(string $slug): ?Post
    {
        return Post::where('slug', $slug)->first();
    }

    public function getByIdOrFail(string $id): Post
    {
        return Post::where('uuid', $id)->firstOrFail();
    }

    public function getById(string $id): ?Post
    {
        return Post::where('uuid', $id);
    }

    public function update(string $id, UpdatePostDTO $data): Post
    {
        $post = $this->getByIdOrFail($id);

        if ($data->titleWasChanged) {
            $post->title = $data->title;
            $post->slug = $data->slug;
        }

        if ($data->contentWasChanged) {
            $post->content = $data->content;
        }

        if ($post->isDirty()) {
            $post->save();
        }

        return $post->refresh();
    }
}