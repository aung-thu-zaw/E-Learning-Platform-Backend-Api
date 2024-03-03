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
        $totalDuration = $this->courses->sum('duration_seconds');

        $hours = floor($totalDuration / 3600);
        $minutes = floor(($totalDuration % 3600) / 60);
        $totalDurationFormatted = sprintf('%02d hours %02d minutes', $hours, $minutes);

        return [
            'id' => $this->id,
            'image' => $this->image,
            'creator' => [
                'name' => $this->creator->display_name,
                'avatar' => $this->creator->avatar,
            ],
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'materials' => $this->materials,
            'final_product' => $this->final_product,
            'level' => $this->level,
            'creator_id' => $this->creator_id,
            'total_course' => $this->courses->count(),
            'total_duration' => $totalDurationFormatted,
        ];
    }
}
