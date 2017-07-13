<?php
/**
 * CATEGORY CONTROLLER (~/app/Http/Controllers/CategoryController.php)
 * ----------------------------------------------------------------------------- 
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 * Controller for all category CRUD - create() was removed!
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use Session;
 
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->paginate(10);
        return view('categories.index')->withCategories($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255']);
        
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        
        Session::flash('success', 'You new category has been created!');
        return redirect()->route('categories.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // will add later (same as TagController)
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // will add later (same as TagController)
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
        // will add later (same as TagController)
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        Session::flash('success', 'Category has been successfully removed');
        return redirect()->route('categories.index');
    }

}  // CategoriesController