<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id', 'created_at'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
