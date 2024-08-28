<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostSummaryResource;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class PostController extends Controller
{
    public PostServiceInterface $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    #[OA\PathItem(
        path: "/posts",
        get: new OA\Get(
            operationId: "postIndex",
            summary: "Get all posts",
            responses: [
                new OA\Response(
                    response: 200,
                    description: "List of posts",
                    content: [
                        new OA\JsonContent(
                            ref: "#/components/schemas/PostSummary"
                        )
                    ]
                )
            ]
        )
    )]
    public function index(Request $request)
    {
        return PostSummaryResource::collection($this->postService->index($request));
    }

    public function store(StorePostRequest $request)
    {
        return new PostResource($this->postService->store($request));
    }

    public function show(Request $request)
    {
        return new PostResource($this->postService->show($request));
    }

    public function update(UpdatePostRequest $request)
    {
        return new PostResource($this->postService->update($request));
    }
}
