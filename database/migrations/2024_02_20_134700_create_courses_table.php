<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->constrained("users")->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subcategory_id')->constrained()->cascadeOnDelete();
            $table->string('thumbnail')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('course_description');
            $table->text('project_description')->nullable();
            $table->enum('type', ['free', 'premium']);
            $table->enum('level', ['beginner', 'intermediate', 'advanced', 'all_levels']);
            $table->enum('status', ['draft', 'pending','published','rejected'])->default('draft');
            $table->enum('language', ['english', 'myanmar','arabic','spanish','french'])->default('English');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
