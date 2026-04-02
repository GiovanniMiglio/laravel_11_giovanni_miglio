<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
use HasFactory;

protected $fillable = [
'title',
'content',
'category',
'author',
'image_url',
'excerpt',
'tags',
'user_id',
];
public function user()
{
    return $this->belongsTo(User::class);
}

}