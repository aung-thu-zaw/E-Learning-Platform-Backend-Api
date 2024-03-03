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
            'id' => $this->id,
            'code' => $this->code,
            'description' => $this->description,
            'type' => $this->type,
            'value' => $this->value,
            'max_uses' => $this->max_uses,
            'uses' => $this->uses,
            'expiry_date' => Carbon::parse($this->expiry_date)->format('d-F-Y'),
            'is_redeemable' => $this->is_redeemable,
            'free_trial_days' => $this->free_trial_days,
        ];
    }
}
