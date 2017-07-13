<?php
/**
 * BLOG CONTROLLER (~/App/Http/Controllers/BlogController.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 * Handles the retrieval of blog posts via ~/blog and ~/blog/{*} routes
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;

class BlogController extends Controller
{
    /**
     * Return a full listing of blog posts (~/blog and ~/post URI's)
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $posts   = Post::orderBy('created_at', 'desc')->paginate(7);  // main page
        $sbposts = Post::orderBy('created_at', 'desc')->paginate(3);  // sidebar
        return view('blog.index')->withPosts($posts)->withSbposts($sbposts);
    }
    

    /**
     * Return a blog post based on a slug
     *
     * @return \Illuminate\Http\Response
     */
    public function getBySlug($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('blog.single')->withPost($post);
    }
    
    
    /**
     * Return a blog post based on a category
     * THIS METHOD IS NOT SET UP NOR TESTED. This is just sketched out so I do
     * not forget that I wanted to add this feature in.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOneByCategory($category)
    {
       // $post = Post::where('slug', '=', $slug)->first();
       // return view('blog.single')->withPost($post);
    }

}  // BlogController
