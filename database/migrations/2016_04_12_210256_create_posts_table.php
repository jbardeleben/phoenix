<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
			$table->string('title');
			$table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}


/*
 * 
 * check the Laravel.com/documentation/ under available types to get all of the
 * database column 'laravel' counterparts as well as other column attributes
 * 
 * This table:
 * 
 * id (int) 
 * title (string) 
 * body (text) 
 * created_at (datetime) 
 * updated_at (datetime) 
 * 
 */