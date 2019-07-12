<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
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
     * Return comments for this post
     */
    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    /**
     * Return category for this post
     */
    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }
    
    /**
     * Return the post owner
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
