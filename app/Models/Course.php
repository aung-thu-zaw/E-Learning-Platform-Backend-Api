<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model
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
        'section_id' => 'integer',
        'spread_by_section' => 'boolean',
    ];

    /**
     * @return array<string>
     */
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
    * @return \Illuminate\Database\Eloquent\Casts\Attribute<Course, never>
    */
    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str_starts_with($value, 'http') || ! $value ? $value : asset("storage/courses/$value"),
        );
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category,Course>
    */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Subcategory,Course>
    */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Lesson>
    */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User,Course>
    */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne<CourseMetric>
    */
    public function metrics()
    {
        return $this->hasOne(CourseMetric::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Resource>
    */
    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Project>
    */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<BlogContent>
    */
    public function blogContents(): BelongsToMany
    {
        return $this->belongsToMany(BlogContent::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<LearningPath>
    */
    public function learningPaths(): BelongsToMany
    {
        return $this->belongsToMany(LearningPath::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Tag>
    */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'course_tag', 'course_id', 'tag_id');
    }

    /**
    * @param Builder<Course> $query
    */
    public function scopeFilterSearch(Builder $query, string $searchTerm): void
    {
        $query->where(function ($query) use ($searchTerm) {
            $query->whereHas('instructor', function ($subquery) use ($searchTerm) {
                $subquery->where('display_name', 'like', "%{$searchTerm}%");
            })
                ->orWhereHas('category', function ($subquery) use ($searchTerm) {
                    $subquery->where('name', 'like', "%{$searchTerm}%");
                })
                ->orWhereHas('subcategory', function ($subquery) use ($searchTerm) {
                    $subquery->where('name', 'like', "%{$searchTerm}%");
                })
                ->orWhere('title', 'like', "%{$searchTerm}%");
        });
    }

    /**
    * @param array<string> $filters
    * @param Builder<Course> $query
    */
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? null,
            function ($query, $keyword) {
                $query->where('title', 'LIKE', '%'.$keyword.'%');
            }
        );

        $query->when($filters['tag'] ?? null, function ($query, $tagSlug) {
            $query->whereHas('tags', function ($query) use ($tagSlug) {
                $query->where('slug', $tagSlug);
            });
        });

        $query->when(isset($filters['level']) && $filters['level'] !== 'none', function ($query) use ($filters) {
            $query->where('level', $filters['level']);
        });

        $query->when(isset($filters["duration"]) && is_string($filters['duration']) && $filters['duration'] !== 'none', function ($query) use ($filters) {
            if ($filters['duration'] === 'short') {
                $query->where('duration_seconds', '<', 3600);
            } elseif ($filters['duration'] === 'medium') {
                $query->whereBetween('duration_seconds', [3600, 10800]);
            } elseif ($filters['duration'] === 'long') {
                $query->where('duration_seconds', '>', 10800);
            }
        });

    }
}
