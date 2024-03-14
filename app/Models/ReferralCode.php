<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReferralCode extends Model
{
    use HasFactory;

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User,ReferralCode>
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
