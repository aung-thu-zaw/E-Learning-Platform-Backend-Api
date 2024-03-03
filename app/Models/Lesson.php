<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Lesson extends Model
{
    use HasFactory;
    use HasSlug;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'id' => 'integer',
        'section_id' => 'integer',
        'course_id' => 'integer',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Course,Lesson>
    */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Subtitle>
    */
    public function subtitles(): HasMany
    {
        return $this->hasMany(Subtitle::class);
    }
}
