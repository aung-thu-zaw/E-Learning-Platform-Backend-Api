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

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Section,Lesson>
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<VideoQuality>
     */
    public function videoQualities(): HasMany
    {
        return $this->hasMany(VideoQuality::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Subtitle>
     */
    public function subtitles(): HasMany
    {
        return $this->hasMany(Subtitle::class);
    }
}
