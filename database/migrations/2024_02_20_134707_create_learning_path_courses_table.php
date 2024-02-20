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
        Schema::disableForeignKeyConstraints();

        Schema::create('learning_path_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_path_id')->cascadeOnDelete();
            $table->string('course_id')->onDelete();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_path_courses');
    }
};
