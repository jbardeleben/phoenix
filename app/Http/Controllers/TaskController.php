<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use Session;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return a full listing of tasks
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('name', 'asc')->paginate(10);
        return view('tasks.index')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Not sure I will be using this method directly, this is more for the
         * form used to create the task, which will be handled on the front with
         * a bootstrap modal dialog box. That will be done via JavaScript, but I
         * may end up using this as a fall back should the user have javascript
         * turned off or blocked. This will need some testing! */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // change the name of task column to name. It needs to be consistent with
        // the other tables. Keep this for now while setting this all up.
        $this->validate($request, [
            'task' => 'required|max:255',
            'description' => 'required|max:1000',  // maxed to 1000 - can change.
        ]);

        $task = new Task;
        $task->task = $request->task;
        $task->description = $request->description;
        $task->save();

        //Session::flash('success', 'This task has been successfully added.');
        //return redirect()->route('tasks.index');
        return Response::json($task);
    }

    /**
     * Display the specified task
     *
     * @param  int  $task_id
     * @return \Illuminate\Http\Response
     */
    public function show($task_id)
    {
        $task = Task::find($task_id);
        return Response::json($task);
    }

    /**
     * Show the form for editing the specified task
     *
     * @param  int  $task_id
     * @return \Illuminate\Http\Response
     */
    public function edit($task_id)
    {
        $task = Task::find($task_id);
        // This will be in the modal form dialog. Save will run update().
        //return view('tasks.edit')->withTask($task);
        return Response::json($task);
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $task_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task_id)
    {
        $task = Task::find($task_id);

        $this->validate($request, [
            'task' => 'required|max:255',
            'description' => 'required|max:1000',  // maxed to 1000 - can change.
            'done' => 'integer'  // this is more for the update method
        ]);
        
        //$task = Task::find($task_id);  // WHY DECLARE TWICE - TEST THIS!
        $task->task = $request->task;
        $task->description = $request->description;
        $task->done = $request->done;  // || 0 -> This is more for the update method
        $task->save();

        //Session::flash('success', 'This task has been successfully added.');
        //return redirect()->route('tasks.index');
        return Response::json($task);
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  int  $task_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task_id)
    {
        $task = Task::find($task_id);
        $task->delete();
        
        //Session::flash('success', 'This task has been successfully removed');
        //return redirect()->route('tasks.index');
        return Response::json($task);
    }
}
