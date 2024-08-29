<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

class PostResource extends JsonResource
{
    #[OA\Schema(
        schema: "Post",
        title: "Post",
        description: "Post resource",
        properties: [
            new OA\Property(
                property: "id",
                type: "string",
                description: "The ID of the post"
            ),
            new OA\Property(
                property: "title",
                type: "string",
                description: "The title of the post"
            ),
            new OA\Property(
                property: "slug",
                type: "string",
                description: "The slug of the post"
            ),
            new OA\Property(
                property: "content",
                type: "string",
                description: "The content of the post"
            ),
            new OA\Property(
                property: "created_at",
                type: "string",
                description: "The date the post was created"
            ),
            new OA\Property(
                property: "updated_at",
                type: "string",
                description: "The date the post was updated"
            ),
            new OA\Property(
                property: "deleted",
                type: "boolean",
                description: "Whether the post is deleted or not"
            )
        ]
    )]
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted' => $this->deleted_at ? true : false,
        ];
    }
}
