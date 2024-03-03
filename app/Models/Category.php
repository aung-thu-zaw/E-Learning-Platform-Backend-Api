<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
    ];

    /**
     * @return array<string>
     */
    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Subcategory>
    */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Course>
    */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Tag>
    */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
