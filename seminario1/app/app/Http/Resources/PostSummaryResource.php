<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

class PostSummaryResource extends JsonResource
{

    #[OA\Schema (
        schema: "PostSummary",
        title: "PostSummary",
        description: "Post summary resource",
        properties: [
            new OA\Property(
                property: "id",
                type: "string",
                format: "uuid",
                description: "The id of the post"
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
            // new OA\Property(
            //     property: "author",
            //     type: "string",
            //     description: "The author of the post"
            // ),
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
            )
        ]
    )]
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'title' => $this->title,
            'slug' => $this->slug,
            // 'author' => $this->user->name,
            'content' => substr($this->content, 0, 200),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
