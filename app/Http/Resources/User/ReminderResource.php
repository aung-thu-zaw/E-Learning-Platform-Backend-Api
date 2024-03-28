<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReminderResource extends JsonResource
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
            'message' => $this->resource->message,
            'frequency' => $this->resource->frequency,
            'date' => $this->resource->date ?? null,
            'time' => $this->resource->time,
            'google_calendar_synced' => $this->resource->google_calendar_synced,
            'days' => $this->resource->reminderDays->pluck('day'),
            'course' => [
                'id' => $this->resource->course->id,
                'title' => $this->resource->course->title,
            ],
            'user' => [
                'id' => $this->resource->user->id,
                'name' => $this->resource->user->display_name,
                'avatar' => $this->resource->user->avatar,
            ],
        ];
    }
}
