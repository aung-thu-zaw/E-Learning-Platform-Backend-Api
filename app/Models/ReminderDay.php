<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReminderDay extends Model
{
    use HasFactory;

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Reminder,ReminderDay>
    */
    public function reminder(): BelongsTo
    {
        return $this->belongsTo(Reminder::class);
    }
}
