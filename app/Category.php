<?php
/**
 * CATEGORY MODEL (~/App/Category.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // posts belonging to a category
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
}  // Category