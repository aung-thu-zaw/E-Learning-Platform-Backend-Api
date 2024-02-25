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
        Schema::create('nav_banners', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->string("url");
            $table->string("button");
            $table->timestamp("countdown")->nullable();
            $table->timestamp("start_date_time");
            $table->timestamp("end_date_time");
            $table->boolean("is_active")->default(false);
            $table->boolean("is_manually_set")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_banners');
    }
};
