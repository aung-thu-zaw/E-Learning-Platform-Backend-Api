<?php

namespace App\Models;

use App\Notifications\Auth\ResetPasswordQueued;
use App\Notifications\Auth\VerifyEmailQueued;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFollow\Traits\Followable;
use Overtrue\LaravelFollow\Traits\Follower;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use Billable;
    use Followable;
    use Follower;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use HasSlug;
    use Notifiable;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_expires_at' => 'datetime',
        'password' => 'hashed',
        'profile_private' => 'boolean',
        'remove_from_search' => 'boolean',
        'enabled_two_factor' => 'boolean',
        'two_factor_code' => 'string',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('display_name')
            ->saveSlugsTo('username');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<User, never>
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::needsRehash($value) ? bcrypt($value) : $value,
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<User, never>
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (! $value) {
                    return asset("storage/avatars/default-avatar-$this->id.png");

                } elseif (! str_starts_with($value, 'http') && ! str_starts_with($value, 'https')) {
                    return asset("storage/avatars/$value");

                } elseif (str_starts_with($value, 'http') || str_starts_with($value, 'https')) {
                    return $value;
                }
            }
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Course>
     */
    public function instructorCourses(): HasMany
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Tag>
     */
    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'user_interest', 'user_id', 'tag_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Course>
     */
    public function savedCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'user_saved_courses', 'user_id', 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<LearningPath>
     */
    public function savedLearningPaths(): BelongsToMany
    {
        return $this->belongsToMany(LearningPath::class, 'user_saved_learning_paths', 'user_id', 'learning_path_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<ReferralCode>
     */
    public function referralCode(): HasOne
    {
        return $this->hasOne(ReferralCode::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<User>
     */
    public function referredUsers(): HasMany
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Enrollment>
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Course>
     */
    public function enrolledCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<EmailNotification>
     */
    public function emailNotifications(): BelongsToMany
    {
        return $this->belongsToMany(EmailNotification::class, 'user_notification_preferences')
            ->using(UserNotificationPreference::class)
            ->withPivot('enabled');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Reminder>
     */
    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailQueued());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordQueued($token));
    }

    public function generateTwoFactorCode(): void
    {
        $this->timestamps = false;
        $this->two_factor_code = (string) rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinute();
        $this->save();
    }

    public function resetTwoFactorCode(): void
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
}
