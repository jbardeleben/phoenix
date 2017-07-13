<?php
/**
 * TAG MODEL (~/App/Tag.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // posts that belong to a tag
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

}  // Tag