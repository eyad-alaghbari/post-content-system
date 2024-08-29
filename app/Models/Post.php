<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'media_type', 'media_path', 'category', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
