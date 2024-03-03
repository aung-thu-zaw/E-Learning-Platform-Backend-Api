<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Subcategory extends Model
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
        'category_id' => 'integer',
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
    * @return \Illuminate\Database\Eloquent\Casts\Attribute<Subcategory, never>
    */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str_starts_with($value, 'http') || ! $value ? $value : asset("storage/subcategories/$value"),
        );
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category,Subcategory>
    */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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

    /**
    * @param Builder<Subcategory> $query
    */
    public function scopeFilterSearch(Builder $query, string $searchTerm): void
    {
        $query->where(function ($query) use ($searchTerm) {
            $query->whereHas('category', function ($subquery) use ($searchTerm) {
                $subquery->where('name', 'like', "%{$searchTerm}%");
            })
            ->orWhere('name', 'like', "%{$searchTerm}%");
        });
    }
}
