<?php

namespace App\Http\Resources\Blogs;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'thumbnail' => $this->resource->thumbnail,
            'content' => $request->is('api/v1/contents/*') ? $this->resource->content : str()->limit($this->resource->content, 100, '...'),
            'published_at' => Carbon::parse($this->resource->published_at)->format('d-F-Y'),
            'author' => [
                'display_name' => $this->resource->author->display_name,
                'avatar' => $this->resource->author->avatar,
            ],
            'category' => [
                'name' => $this->resource->blogCategory->name,
                'slug' => $this->resource->blogCategory->slug,
            ],
        ];
    }
}
