<?php
/**
 * ROUTING (~/app/Http/routes.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 */

/**
 * Application Routes
 * -----------------------------------------------------------------------------
 * This route group applies the *web middeware group to every route it contains.
 * The *web middleware group is defined in your HTTP kernel and includes session
 * state, CSRF protection, and more.
 *
 * NOTE: Route::group(['middleware']) must be Route::group(['middlewareGroups'])
 * to allow the Session::*() methods to execute correctly. Seems to be a glitch
 * in the documentation somewhere as ['middleware' => ['web]] is suggested.
 */
use App\Task;  // this will be removed once I have the crud set up in the controller
use Illuminate\Http\Request;  // remove once I have the crud set up in controller

Route::group(['middlewareGroups' => ['web']], function() {
	
    // RESOURCE ROUTES (These can be used for internal/external API calls! :) )
    // ** removed create method from CategoryController and TagController's
	//Route::resource('auth',  'AuthController');
    Route::resource('users', 'UsersController');
    Route::resource('posts', 'PostController');
    Route::resource('admin', 'AdminController');
    Route::resource('tags',  'TagController', ['except'=>['create']]);
    Route::resource('categories', 'CategoryController', ['except'=>['create']]);
    Route::resource('tasks', 'TaskController'/*, ['except'=>['create']]*/);
        
    
    // AUTHENTICATION/REGISTRATION/PASSWORD MANAGEMENT ROUTES
    Route::get( 'auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
    Route::post('auth/login',  'Auth\AuthController@postLogin');
    Route::get( 'auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);
    
    // Registration Routes
    Route::get( 'auth/register', ['uses' => 'Auth\AuthController@getRegister', 'as' => 'register']);
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    
    // Password Reset Routes (The ? in token means it's optional in the URL)
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');
    
    // Admin custom routes
    Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
    Route::get('articles', ['uses' => 'AdminController@getAll', 'as' => 'admin.all']);
    
    // route for ~/blog{/*}
    Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
    
    Route::get(
        'blog/{slug}', ['uses' => 'BlogController@getBySlug', 'as' => 'blog.single']
    )->where('slug', '[\w\d\-\_]+');


    // routes for comments
    Route::post('comments/{id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
    Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
    Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
    // button workaround
    Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
    
    
    // Main page routes (name these routes as I did '/'!)    
    Route::get('/', ['as'=>'/', 'uses'=>'PagesController@getIndex']);
    Route::get('home',    'PagesController@getHome');
    Route::get('about',   'PagesController@getAbout');
    Route::get('company', 'PagesController@getCompany');
    Route::get('opws-f',  'PagesController@getOpwsF');
    Route::get('opws-s',  'PagesController@getOpwsS');
    
    // CONTACT PAGE
    Route::get('contact',  'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
    

    // NOT SET UP
    Route::get('/settings',    'PagesController@getSettings');


    // TASKS DEMO PAGE - THESE NEED TO BE PUT INSIDE A TASK CONTROLLER (TaskController)
    Route::get('tasks', ['uses' => 'TaskController@index', 'as' => 'tasks.index']);

    Route::get('/tasks/{task_id?}',function($task_id) {
        $task = Task::find($task_id);
        return Response::json($task);
    });

    Route::post('/tasks',function(Request $request) {
        $task = Task::create($request->all());
        return Response::json($task);
    });

    Route::put('/tasks/{task_id?}',function(Request $request,$task_id) {
        $task = Task::find($task_id);
        $task->task = $request->task;
        $task->description = $request->description;
        $task->save();

        return Response::json($task);
    });

    Route::delete('/tasks/{task_id?}',function($task_id) {
        $task = Task::destroy($task_id);
        return Response::json($task);
    });
});