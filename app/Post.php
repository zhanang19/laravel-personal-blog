<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $with = [
        'category',
        'comments',
    ];

    /**
     * Return comments for the post
     */
    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }
}
