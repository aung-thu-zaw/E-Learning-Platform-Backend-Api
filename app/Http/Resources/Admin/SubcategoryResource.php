<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
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
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $request->is('api/v1/admin/subcategories/*') && $request->method() !== 'PUT' ? $this->description : str()->limit($this->description, 60, '...'),
            'image' => $this->image,
            'status' => $this->status,
            'category' => [
                'name' => $this->category->name,
                'count' => $this->category->count(),
            ],
        ];
    }
}
