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
            operationId: "IndexPost",
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
        ),
        post: new OA\Post(
            operationId: "StorePost",
            summary: "Create a new post",
            requestBody: new OA\RequestBody(
                required: true,
                content: [
                    new OA\JsonContent(
                        ref: "#/components/schemas/StorePostRequest"
                    )
                ]
            ),
            responses: [
                new OA\Response(
                    response: 201,
                    description: "Post created",
                    content: [
                        new OA\JsonContent(
                            ref: "#/components/schemas/Post"
                        )
                    ]
                ),
                new OA\Response(
                    response: 422,
                    description: "Validation error",
                    // content: [
                    //     new OA\JsonContent(
                    //         ref: "#/components/schemas/ValidationError"
                    //     )
                    // ]
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
    #[OA\PathItem(
        path: "/posts/{id}",
        parameters: [
            new OA\Parameter(
                ref: "#/components/parameters/PostId"
            )
        ],
        put: new OA\Put(
            operationId: "UpdatePost",
            summary: "Update a post",
            requestBody: new OA\RequestBody(
                required: true,
                content: [
                    new OA\JsonContent(
                        ref: "#/components/schemas/UpdatePostRequest"
                    )
                ]
            ),
            responses: [
                new OA\Response(
                    response: 200,
                    description: "Post updated",
                    content: [
                        new OA\JsonContent(
                            ref: "#/components/schemas/Post"
                        )
                    ]
                )
            ]
        )
    )]
    public function show(Request $request)
    {
        return new PostResource($this->postService->show($request));
    }
    #[OA\Parameter(
        parameter: "PostId",
        name: "PostId",
        in: 'path',
        required: true,
        description: "The ID of the post",
        schema: new OA\Schema(
            type: "string"
        )
    )]
    public function update(UpdatePostRequest $request)
    {
        return new PostResource($this->postService->update($request));
    }
}
