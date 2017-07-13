<?php
/**
 * POST MODEL (~/App/Post.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // The user that belongs to the post
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // The category that belongs to the post
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // The tags that belong to the post
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    // The comments that belong to the post
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
}  // Post