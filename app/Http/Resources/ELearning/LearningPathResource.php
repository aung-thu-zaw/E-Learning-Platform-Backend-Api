<?php

namespace App\Http\Resources\ELearning;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LearningPathResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $totalDuration = $this->resource->courses->sum('duration_seconds');

        return [
            'id' => $this->resource->id,
            'image' => $this->resource->image,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'description' => $this->resource->description,
            'materials' => $this->resource->materials,
            'final_product' => $this->resource->final_product,
            'level' => $this->resource->level,
            'creator_id' => $this->resource->creator_id,
            'total_course' => $this->resource->courses->count(),
            'total_duration' => sprintf('%02d hours %02d minutes', floor($totalDuration / 3600), floor(($totalDuration % 3600) / 60)),
            'creator' => [
                'name' => $this->resource->creator->display_name,
                'avatar' => $this->resource->creator->avatar,
            ],
        ];
    }
}
