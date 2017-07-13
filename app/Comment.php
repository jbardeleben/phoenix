<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        // Post that belongs to comments
        return $this->belongsTo('App\Post');
    }
}
