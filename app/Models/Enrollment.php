<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    use HasFactory;

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User,Enrollment>
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Course,Enrollment>
    */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
