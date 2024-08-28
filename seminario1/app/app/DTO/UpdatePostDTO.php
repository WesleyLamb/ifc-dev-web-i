<?php

namespace App\DTO;

use App\Http\Requests\UpdatePostRequest;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Str;

class UpdatePostDTO
{
    public bool $titleWasChanged = false;
    public string $title;
    public bool $contentWasChanged = false;
    public string $content;
    public string $slug;

    private function setTitle(string $aValue): void
    {
        $this->titleWasChanged = true;
        $this->title = $aValue;

        $repo = app()->make(PostRepositoryInterface::class);

        $slug = Str::slug($aValue);
        while ($repo->getBySlug($slug)) {
            $slug = Str::slug($aValue . ' ' . Str::random(5));
        }
        $this->slug = $slug;
    }

    private function setContent(string $aValue): void
    {
        $this->contentWasChanged = true;
        $this->content = $aValue;
    }

    public static function fromRequest(UpdatePostRequest $request) 
    {
        $dto = new self();
        if ($request->has('title'))
            $dto->setTitle($request->get('title'));

        if ($request->has('content'))
            $dto->setContent($request->get('content'));

        return $dto;
    }


}