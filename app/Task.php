<?php
/**
 * TASK MODEL (~/app/Task.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben
 * @copyright (C) 2016 Jay Bardeleben
 * Task model
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task', 'description','done'];
}
