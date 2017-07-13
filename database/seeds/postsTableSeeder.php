<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds. NOTE that these columns will all need updating,
     * this will be just to get some data going. I want to basically create 30
     * random posts for dummy data and as I need, customize it (as all strings
     * will be the same length of 'random' values).
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            //'name' => str_random(10)
            'title' => str_random(15),
            'body'  => str_random(300),
            'slug'  => str_random(10)
        ]);
    }
}
