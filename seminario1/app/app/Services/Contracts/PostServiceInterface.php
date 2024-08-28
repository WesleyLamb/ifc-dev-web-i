<?php

namespace App\Services\Contracts;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PostServiceInterface
{
    public function index(Request $request): Collection;
    public function store(StorePostRequest $request): Post;
    public function show(Request $request): Post;
    public function update(UpdatePostRequest $request): Post;
}
