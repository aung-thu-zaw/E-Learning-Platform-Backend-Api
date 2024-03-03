<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resource extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Course,Resource>
    */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
