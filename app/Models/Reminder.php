<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reminder extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'google_calendar_synced' => 'boolean',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Casts\Attribute<Reminder, never>
    */
    protected function time(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Carbon::createFromTime($value['hours'], $value['minutes'], $value['seconds']),
        );
    }

    /**
    * @return \Illuminate\Database\Eloquent\Casts\Attribute<Reminder, never>
    */
    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('j F, Y', strtotime($value)),
        );
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User,Reminder>
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Course,Reminder>
    */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<ReminderDay>
    */
    public function reminderDays(): HasMany
    {
        return $this->hasMany(ReminderDay::class);
    }
}
