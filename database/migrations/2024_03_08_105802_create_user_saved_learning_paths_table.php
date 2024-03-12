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
        Schema::create('user_saved_learning_paths', function (Blueprint $table) {
            $table->primary(["user_id","learning_path_id"]);
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("learning_path_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_saved_learning_paths');
    }
};
