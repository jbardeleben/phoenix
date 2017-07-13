<?php
/**
 * POST CONTROLLER (~/app/Http/Controllers/PostController.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 * Controller for all post CRUD
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;  // cleans the posts $request->body (or whatever)

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // locks down class
    }
    

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }


    /**
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags       = Tag::all();

        // return the sorted results to the view
        $tagsSorted = $tags->sortBy('name');
        $tagsSorted->values()->all();

        return view('posts.create')
            ->withCategories($categories)->withTags($tagsSorted);
    }


    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);  // DEBUGGER - laravel command for 'die and dump'

        // I need to get the user id and add it to the save. This will not have
        // to be validated as it will be returned from the users database table

        $this->validate($request, [
            'title'       => 'required|max:255',
            'slug'        => 'required|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body'        => 'required'
        ]);

        $matches = "/[^A-Za-z0-9-_ ]/i";
        $slug = preg_replace($matches, "-", $request->slug);
        $storeSlug = str_replace(" ", "-", $slug);
        
        $post = new Post;
        $post->title        = $request->title;
        $post->slug         = $storeSlug;
        $post->category_id  = $request->category_id;
        $post->body         = Purifier::clean($request->body);
        $post->save();
        
        // associate tags using sync(). MAKE SURE TO PASS IN FALSE SECOND PARAM!
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Post saved successfully!');
        return redirect()->route('posts.show', $post->id);
    }


    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }


    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('posts.edit')
            ->withPost($post)->withTags($tags)
            ->withCategories($categories);
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
        $post = Post::find($id);
        if ($request->slug === $post->slug) {
            $this->validate($request, [   
                'title'       => 'required|max:255',
                'category_id' => 'required|integer',
                'body'        => 'required'
            ]);
        }
        else {
            $this->validate($request, [   
                'title'       => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'body'        => 'required'
            ]);
        }

        $matches = "/[^A-Za-z0-9-_ ]/i";
        $slug = preg_replace($matches, "-", $request->slug);
        $storeSlug = str_replace(" ", "-", $slug);
        
        $post = Post::find($id);  // WHY DECLARE TWICE - TEST THIS!
        $post->title        = $request->title;
        $post->slug         = $storeSlug;
        $post->category_id  = $request->category_id;
        $post->body         = Purifier::clean($request->body);
        $post->save();

        // Check to see if the request object for tags is not empty. If it is,
        // an empty array must be past into the sync method.
        if (isset($request->tags)) {
            // Unlike create, we want to use true because we want to overwrite
            // the current tag association and replace it with this new one.
            $post->tags()->sync($request->tags, true);
        }
        else {
            $post->tags()->sync(array());
        }
        
        Session::flash('success', 'Changes successfully saved!');
        return redirect()->route('posts.show', $post->id);
    }


    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        
        Session::flash('success', 'Post successfully deleted.');
        return redirect()->route('posts.index');
    }

}  // PostController
