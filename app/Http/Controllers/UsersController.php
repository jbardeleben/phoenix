<?php
/**
 * USERS CONTROLLER (~/App/Http/Controllers/UsersController.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 * Controller for Users CRUD
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users;
use App\User;
use Session;

class UsersController extends Controller
{
    /**
     * Show all of the users for the application
     *
     * @return Response
     */
    public function index()
    {
        $users = Users::orderBy('id', 'asc')->paginate(10);
        return view('users.index')->withUsers($users);
    }
    

    /**
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // will probably remove
    }
    

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // will probably remove
    }
    

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);
        return view('users.show')->withUser($user);
    }
    

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);
        return view('users.edit')->withUser($user);
    }
    

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Users::find($id);
        if ($request->input('email') === $user->email) {
            $this->validate($request, [
                'name'  => 'max:255',
            ]);
        }
        else {
            $this->validate($request, [
                'name'  => 'max:255',
                'email' => 'email|max:255|unique:users'
            ]);
        }
        
        $user = Users::find($id);
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        
        Session::flash('success', 'This account has been updated');
        return redirect()->route('users.show', $user->id);
    }
    

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
        
        Session::flash('success', 'User has been deleted');
        return redirect()->route('users.index');
    }
    

    /**
     * Suspend will be designed to "close" an account without removing the data
     * so the user information will still be available should the user want to
     * restore thir account. destroy() will permanently remove the account and
     * all related data to that account (non-recoverable). NOT YET SET UP!
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function suspend($id)
    {
        //$user = Users::find($id);
        
        //$user->status = $request->status;
        //$user->save();
        
        // Flash/redirect
        //Session::flash('success', 'Account suspended');
        //return redirect()->route('users.index');
    }
    
}  // Users