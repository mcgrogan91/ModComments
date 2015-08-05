<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class CommentController extends Controller
{

    public function __construct()
    {
       $this->middleware('host');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(Comment::all(), 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Response::json(['thing'=>'value2'], 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $profile = Profile::firstOrCreate(['tagpro_identifier' => $input['profile']]);

        $comment = new Comment;
        $comment->profile_id = $profile->id;
        $comment->comment_text = $input['comment'];
        $comment->mod_name = $input['modName'];
        $comment->save();

        return Response::json($comment, 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return Response
     */
    public function show($id)
    {
      $comments = [];
      $profile = Profile::where([
        'tagpro_identifier' => $id
        ])->first();
      if($profile) {
        $comments = $profile->comments;
      }

      return response(view('comments', ['comments' => $comments]))
        ->header('Access-Control-Allow-Origin', '*');

        //return Response::json($comments, 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return Response::json(['thing'=>'value5'], 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return Response::json(['thing'=>'value6'], 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Response::json(['thing'=>'value7'], 200, array('Access-Control-Allow-Origin' => '*'));
    }
}
