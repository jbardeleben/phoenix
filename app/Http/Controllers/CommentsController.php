<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Post;
use App\Comment;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email|max:255',
            'comment' => 'required|min:5|max:2000'
        ]);
        
        // This will use the same editor that is on the create page! Therefore
        // I will be applying a rich text editor to all areas that allow for a
        // user to input text via a textarea element, so there will be no need
        // to string search an entire comment and individually strip out HTML
        // tags because only a set of them will be allowed through the editor -
        // in theory (it works great on the create page).

        //$newComment = str_replace('\r', '<br>', $request->comment);

        $post = Post::find($postId);

        $comment = new Comment();
        $comment->name    = $request->name;
        $comment->email   = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;  // hard-code for now
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Your comment was added');
        return redirect()->route('blog.single', [$post->slug]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $comment = Comment::find($id);
        $this->validate($request, ['comment' => 'required']);

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment updated');
        return redirect()->route('posts.show', $comment->post->id);
    }


    /**
     *
     */
    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        // To save the post id before comment is deleted
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'Comment was successfully deleted');
        return redirect()->route('posts.show', $post_id);
    }
}  // CommentsController