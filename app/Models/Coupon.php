<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Coupon extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'is_redeemable' => 'boolean',

    ];

    /**
     * @return array<string>
     */
    public function toSearchableArray(): array
    {
        return [
            'code' => $this->code,
        ];
    }
}
