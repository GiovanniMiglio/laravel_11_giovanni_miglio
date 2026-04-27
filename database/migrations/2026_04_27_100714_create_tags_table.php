<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $tags = [
            'Anime',
            'Manga',
            'Shonen',
            'Seinen',
            'Shojo',
            'Isekai',
            'Fantasy',
            'Mecha',
            'Slice of Life',
            'Horror',
            'Commedia',
            'Avventura',
            'Sci-Fi',
            'Thriller',
            'Psicologico',
            'Romance',
            'Videogiochi',
            'Recensioni',
            'Guide',
            'Tecnologia',
            'Nintendo',
            'PlayStation',
            'Xbox',
            'PC Gaming',
            'Esports'
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
