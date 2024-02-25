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
            "id" => $this->id,
            "author_id" => $this->author_id,
            "blog_category_id" => $this->blog_category_id,
            "thumbnail" => $this->thumbnail,
            "title" => $this->title,
            "slug" => $this->slug,
            'content' => $request->is('api/v1/admin/blog-contents/*') && $request->method() !== "PUT" ? $this->content : str()->limit($this->content, 60, '...'),
            "status" => $this->status,
            "published_at" => $this->published_at,
            'author' => [
                'display_name' => $this->author->display_name,
                'avatar' => $this->author->avatar,
            ],
            'category' => [
                'name' => $this->blogCategory->name,
                'slug' => $this->blogCategory->slug,
                'count' => $this->blogCategory->count(),
            ],
        ];
    }
}
