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

        Schema::create('learning_paths', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('creator_id')->constrained('users');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('materials');
            $table->string('final_product');
            $table->enum('level', ['beginner', 'intermediate', 'advanced', 'all_levels']);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_paths');
    }
};
