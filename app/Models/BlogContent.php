<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class BlogContent extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;

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
     * @return array<string>
     */
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? date('F j, Y', strtotime($value)) : null,
        );
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'author_id' => 'integer',
        'published_at' => 'timestamp',
        'blog_category_id' => 'integer',
    ];

    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str_starts_with($value, 'http') || ! $value ? $value : asset("storage/blog-contents/$value"),
        );
    }

    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function scopeFilterSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->whereHas('author', function ($subquery) use ($searchTerm) {
                $subquery->where('display_name', 'like', "%{$searchTerm}%");
            })
                ->orWhereHas('blogCategory', function ($subquery) use ($searchTerm) {
                    $subquery->where('name', 'like', "%{$searchTerm}%");
                })
                ->orWhere('title', 'like', "%{$searchTerm}%");
        });
    }
}
