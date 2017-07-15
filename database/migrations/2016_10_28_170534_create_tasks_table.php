<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Task;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations. Nothing here is currently required, but I am planning
     * to make the name ('task') required. I also want to change 'task' to 'name'
     * so that it has the same format as all the other tables.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task');
            $table->string('description');
            $table->boolean('done');
            $table->timestamps();
        });

        Task::create([
            'task' => 'Weekend hookup',
            'description' => 'Call Helga in the afternoon',
            'done' => false,
        ]);

        Task::create([
            'task' => 'Late night coding',
            'description' => 'Finishing coding POS API',
            'done' => false,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
