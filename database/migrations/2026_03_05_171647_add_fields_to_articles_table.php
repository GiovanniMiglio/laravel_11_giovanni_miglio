<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('category')->nullable();
            $table->string('author')->nullable();
            $table->string('image_url')->nullable();
            $table->string('excerpt', 300)->nullable();
            $table->string('tags')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['category', 'author', 'image_url', 'excerpt', 'tags']);
        });
    }
};
