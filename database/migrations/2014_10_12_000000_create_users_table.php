<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('provider_id')->unique()->nullable();
            $table->enum('provider', ['facebook', 'google'])->nullable();
            $table->string('avatar')->nullable();
            $table->string('username')->unique();
            $table->string('display_name');
            $table->string('headline')->nullable();
            $table->text('about_me')->nullable();
            $table->enum('role', ['admin', 'instructor', 'student'])->default('student');
            $table->enum('status', ['active', 'suspended'])->default('active');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('personal_website_url')->nullable();
            $table->foreignId('referrer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('profile_private')->default(false);
            $table->boolean('remove_from_search')->default(false);
            $table->boolean('enabled_two_factor')->default(false);
            $table->string('two_factor_code')->nullable();
            $table->dateTime('two_factor_expires_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
