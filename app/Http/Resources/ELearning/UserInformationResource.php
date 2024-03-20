<?php

namespace App\Http\Resources\ELearning;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInformationResource extends JsonResource
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
            'provider_id' => $this->resource->provider_id,
            'provider' => $this->resource->provider,
            'avatar' => $this->resource->avatar,
            'username' => $this->resource->username,
            'display_name' => $this->resource->display_name,
            'headline' => $this->resource->headline,
            'about_me' => $this->resource->about_me,
            'role' => $this->resource->role,
            'status' => $this->resource->status,
            'email' => $this->resource->email,
            'email_verified_at' => $this->resource->email_verified_at,
            'facebook_url' => $this->resource->facebook_url,
            'twitter_url' => $this->resource->twitter_url,
            'instagram_url' => $this->resource->instagram_url,
            'pinterest_url' => $this->resource->pinterest_url,
            'youtube_url' => $this->resource->youtube_url,
            'github_url' => $this->resource->github_url,
            'personal_website_url' => $this->resource->personal_website_url,
            'referrer_id' => $this->resource->referrer_id,
            'profile_private' => $this->resource->profile_private,
            'remove_from_search' => $this->resource->remove_from_search,
            'students_count' => 'ok',
            'reviews_count' => 'ok',
            'followers_count' => number_format($this->resource->followers->count()),
            'following_count' => number_format($this->resource->followings->count()),
            'courses' => CourseResource::collection($this->resource->courses)
        ];
    }
}
