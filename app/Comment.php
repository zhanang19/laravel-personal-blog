<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Return the comment owner
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
