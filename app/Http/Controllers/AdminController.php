<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;

class AdminController extends Controller
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
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        
        $tagsSorted = $tags->sortBy('name');
        $tagsSorted->values()->all();

        return view('admin.index')->withPosts($posts)
            ->withCategories($categories)->withTags($tagsSorted);
    }
    
    public function getAll()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(7);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        
        $tagsSorted = $tags->sortBy('name');
        $tagsSorted->values()->all();

        return view('admin.posts')->withPosts($posts)
            ->withCategories($categories)->withTags($tagsSorted);
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
        $tagsSorted = $tags->sortBy('name');
        $tagsSorted->values()->all();

        return view('admin.create')
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
        $this->validate($request, [
            'title'       => 'required|max:255',
            'slug' => 'required|min:5|max:255|unique:posts,slug',
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
        
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Post saved successfully!');
        return redirect()->route('admin.show', $post->id);
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
        return view('admin.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('admin.edit')
            ->withPost($post)->withTags($tags)
            ->withCategories($categories);
    }
    */

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
        
        if (isset($request->tags)) { $post->tags()->sync($request->tags, true); }
        else { $post->tags()->sync(array()); }
        
        Session::flash('success', 'Changes successfully saved!');
        return redirect()->route('admin.show', $post->id);
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
        return redirect()->route('admin.index');
    }
}  // AdminController
