<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'code' => $this->resource->code,
            'description' => $this->resource->description,
            'type' => $this->resource->type,
            'value' => $this->resource->value,
            'max_uses' => $this->resource->max_uses,
            'uses' => $this->resource->uses,
            'expiry_date' => Carbon::parse($this->resource->expiry_date)->format('d-F-Y'),
            'is_redeemable' => $this->resource->is_redeemable,
            'free_trial_days' => $this->resource->free_trial_days,
        ];
    }
}
