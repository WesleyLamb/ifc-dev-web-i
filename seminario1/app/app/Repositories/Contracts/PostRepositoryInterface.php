<?php

namespace App\Repositories\Contracts;

use App\DTO\StorePostDTO;
use App\DTO\UpdatePostDTO;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function index(): Collection;
    public function store(StorePostDTO $data): Post;
    public function getBySlugOrFail(string $slug): Post;
    public function getBySlug(string $slug): ?Post;
    public function update(string $slug, UpdatePostDTO $data): Post;
}