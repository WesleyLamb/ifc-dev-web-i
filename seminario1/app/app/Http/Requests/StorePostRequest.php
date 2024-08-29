<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    #[OA\Schema(
        schema: "StorePostRequest",
        title: "StorePostRequest",
        description: "Store post request",
        required: [
            "title",
            "content"
        ],
        properties: [
            new OA\Property(
                property: "title",
                type: "string",
                description: "The title of the post"
            ),
            new OA\Property(
                property: "content",
                type: "string",
                description: "The content of the post"
            )
        ]
    )]
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
        ];
    }
}
