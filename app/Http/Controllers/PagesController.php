<?php
/**
 * PAGES CONTROLLER (~/app/Http/Controllers/PagesController.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben
 * @copyright (c) 2016 Jay Bardeleben
 * This controller sets the methods to return all the named route view resources
 * $posts = Post::orderBy('created_at', 'desc')->limit(3)->get() on all pages is
 * for the posts displayed in the sidebar
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Session;
use Mail;

class PagesController extends Controller
{
    /**
     * Set up and return the MAIN INDEX view
     *
     * @return 
     */
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.welcome')->withPosts($posts);
    }
    

    public function getHome() {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.home')->withPosts($posts);
    }
    

    public function getAbout() {
        return view('pages.about');
    }


    public function getCompany() {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.company')->withPosts($posts);
    }


    public function getOpwsF() {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.opws-f')->withPosts($posts);
    }


    public function getOpwsS() {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.opws-s')->withPosts($posts);
    }
    

    public function getContact() {
        return view('pages.contact');
    }


    public function getAdmin() {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('posts.admin')->withPosts($posts);
    }
    

    public function postContact(Request $request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'subject' => 'required|min:1|max:100',
            'message' => 'required|min:1|max:1000'
        ]);

        // in email, these will be their own variables ($email, etc)
        $data = [
            'email'    => $request->email,
            'subject'  => $request->subject,
            'eMessage' => $request->message 
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            // email header information (see Laravel documentation)
            $message->from($data['email']);
            $message->to('jbardeleben@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your message has been sent!');
        return redirect()->route('/');
    }

    
    // This will need to be moved to the UsersController
    public function getSettings() {
        return view('pages.settings');
    }
    
}  // PagesController
