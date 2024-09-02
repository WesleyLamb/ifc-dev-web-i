<?php

namespace App\DTO;

use App\Http\Requests\StorePostRequest;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Str;

class StorePostDTO
{
    public string $title;
    public string $content;
    public string $slug;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;

        $repo = app()->make(PostRepositoryInterface::class);
        $slug = Str::slug($title);
        while ($repo->getBySlug($slug, true)) {
            $slug = Str::slug($title . ' ' . Str::random(5));
        }
        $this->slug = $slug;
    }

    public static function fromRequest(StorePostRequest $request): StorePostDTO
    {
        return new self(
            $request->get('title'),
            $request->get('content')
        );
    }
}