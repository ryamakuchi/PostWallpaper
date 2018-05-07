<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Intervention Image
use Illuminate\Support\Facades\Input;
// use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image;

use App\Comment;
use App\Post;

class CommentsController extends Controller
{

    // バリデーションのルール
    public $validateRules = [
        'contributor' => 'max:100',
        'body' => 'max:5000|required',
        'delete_key' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validateRules);
        Comment::create($request->all());
        \Session::flash('flash_message', 'コメントを作成しました。');
        $id = $request->post_id;
        $post = Post::find($id);
        $comments = Post::find($id)->comments;
        $tags = explode(",", Post::find($id)->tag);
        return view('show', compact('post', 'comments', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
