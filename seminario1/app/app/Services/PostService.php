<?php

namespace App\Services;

use App\DTO\StorePostDTO;
use App\DTO\UpdatePostDTO;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class PostService implements PostServiceInterface
{
    public PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request): Collection
    {
        return $this->postRepository->index();
    }

    public function store(StorePostRequest $request): Post
    {
        return $this->postRepository->store(StorePostDTO::fromRequest($request));
    }

    public function show(Request $request): Post
    {
        return $this->postRepository->getByIdOrFail($request->route('id'));
    }

    public function update(UpdatePostRequest $request): Post
    {
        return $this->postRepository->update($request->route('id'), UpdatePostDTO::fromRequest($request));
    }
}