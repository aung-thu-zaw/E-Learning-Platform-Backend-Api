<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tag extends Model
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
        'subcategory_id' => 'integer',
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
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category,Tag>
    */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Subcategory,Tag>
    */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Course>
    */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User>
    */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_interest', 'tag_id', 'user_id')->withTimestamps();
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<LearningPath>
    */
    public function learningPaths(): BelongsToMany
    {
        return $this->belongsToMany(LearningPath::class, 'learning_path_tag', 'learning_path_id', 'tag_id');
    }

    /**
    * @param Builder<Tag> $query
    */
    public function scopeFilterSearch(Builder $query, string $searchTerm): void
    {
        $query->where(function ($query) use ($searchTerm) {
            $query->whereHas('category', function ($subquery) use ($searchTerm) {
                $subquery->where('name', 'like', "%{$searchTerm}%");
            })
            ->orWhereHas('subcategory', function ($subquery) use ($searchTerm) {
                $subquery->where('name', 'like', "%{$searchTerm}%");
            })
            ->orWhere('name', 'like', "%{$searchTerm}%");
        });
    }
}
