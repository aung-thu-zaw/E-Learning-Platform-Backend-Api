<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogCategoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $request->is('api/v1/admin/blog-categories/*') && $request->method() !== "PUT" ? $this->description : str()->limit($this->description, 60, '...'),
            'status' => $this->status,
        ];
    }
}
