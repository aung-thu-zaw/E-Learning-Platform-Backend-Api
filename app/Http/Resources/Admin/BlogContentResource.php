<?php

namespace App\Http\Resources\Admin;

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
            'author_id' => $this->resource->author_id,
            'blog_category_id' => $this->resource->blog_category_id,
            'thumbnail' => $this->resource->thumbnail,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'content' => $request->is('api/v1/admin/blog-contents/*') && $request->method() !== 'PUT' ? $this->resource->content : str()->limit($this->resource->content, 60, '...'),
            'status' => $this->resource->status,
            'published_at' => $this->resource->published_at,
            'author' => [
                'display_name' => $this->resource->author->display_name,
                'avatar' => $this->resource->author->avatar,
            ],
            'category' => [
                'name' => $this->resource->blogCategory->name,
                'slug' => $this->resource->blogCategory->slug,
                'count' => $this->resource->blogCategory->count(),
            ],
        ];
    }
}
