<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model 
{
    use SoftDeletes;

    protected $fillable = [
        'judul',
        'category_id',
        'content',
        'gambar',
        'slug',
        'users_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);  // Changed to singular 'Tag'
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    protected $table = 'posts';
}

