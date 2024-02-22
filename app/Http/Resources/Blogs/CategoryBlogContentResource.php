<?php

namespace App\Http\Resources\Blogs;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryBlogContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'thumbnail' => $this->thumbnail,
            'content' => $request->is('api/v1/contents/*') ? $this->content : str()->limit($this->content, 60, '...'),
            'published_at' => Carbon::parse($this->published_at)->format('d-F-Y'),
            'author' => [
                'display_name' => $this->author->display_name,
                'avatar' => $this->author->avatar,
            ],
            'category' => [
                'name' => $this->blogCategory->name,
                'slug' => $this->blogCategory->slug,
                'description' => $this->blogCategory->description,
            ],
        ];
    }
}
