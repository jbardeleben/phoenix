<?php
/**
 * TAG CONTROLLER (~/App/Http/Controllers/TagController.php)
 * -----------------------------------------------------------------------------
 * @author Jay Bardeleben <jbardeleben@gmail.com>
 * @copyright (c) 2016 Jay Bardeleben
 * Controller for the tag CRUD
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Tag;
use Session;

class TagController extends Controller
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
        $tags = Tag::orderBy('name', 'asc')->paginate(20);

        // place all tags in the taglist.xml for the tag search functionality
        $taglist = Tag::all();
        $xml  = '<?xml version="1.0" encoding="utf-8"?>' . "\n\t<pages>\n";
        foreach($taglist as $tag) {
            $xml .= "\t\t<link>\n";
            $xml .= "\t\t\t<tag>" . $tag->name . "</tag>\n";
            $xml .= "\t\t\t<tagurl>" . '/tags/' . $tag->id . "</tagurl>\n";
            $xml .= "\t\t</link>\n";
        }
        $xml .= "\t</pages>\n";
        file_put_contents("scripts/taglist.xml", $xml);

        return view('tags.index')->withTags($tags);
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
        
        $tag = new Tag;

        // do a check to see if the tag already exists, if not, save it
        
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'New tag was successfully created!');
        return redirect()->route('tags.index');
    }


    /**
     * checkForTag will check if a tag exists. This will be used in the request
     * sent by the addtag.js. If a tag does not exist, it will run store()
     *
     * I THINK I CAN GET AWAY WITH PUTTING THIS FUNCTIONALITY IN THE STORE METHOD
     *
     * @param \String $tag Name of the tag to check
     * @return bool
     */
    public function checkForTag($tag) {
        $isAvailable = false;
        $this->validate($tag, ['name' => 'max:255']);

        $t = strip_tags($tag);
        $tags = Tag::all();
        // check if the tag is in this array... (should be a return array)
        if (in_array($t, $tags)) {
            $isAvailable = false;
        }
        else {
            $isAvailable = true;
        }

        return $isAvailable;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
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
        $tag = Tag::find($id);

        $this->validate($request, ['name' => 'required|max:255']);
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Tag was successfully updated!');
        return redirect()->route('tags.show', $tag->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        
        Session::flash('success', 'This tag has been successfully removed');
        return redirect()->route('tags.index');
    }

}  // TagController