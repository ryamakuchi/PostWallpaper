<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = ['id', 'genre'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
