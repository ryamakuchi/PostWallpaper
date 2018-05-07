<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Intervention Image
use Illuminate\Support\Facades\Input;
// use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image;

use App\Post;
use App\Genre;

class PostsController extends Controller
{

    // バリデーションのルール
    public $validateRules = [
        'title' => 'required|max:50',
        'file' => 'required|image',
        'body' => 'max:5000',
        'contributor' => 'max:100',
        'category' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('genre', 'id');
        $genres = $genres -> prepend('ジャンルを選択してください', '');
        return view('create', compact('genres'));
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
        $input = $request->all();
        // 新しいpic_idを生成
        $pic_id = Post::orderBy('id', 'desc')->take(1)->value('pic_id');
        ++$pic_id;
        // 名前と拡張子を取得
        $fig_name = $input['file']->getClientOriginalName();
        $fig_mime = $input['file']->extension($input['file']);
        $image = Image::make($input['file']->getRealPath());
        $image->save(public_path() . '/media/' . $pic_id . '.' . $fig_mime);
        Post::create([
            'pic_id' => $pic_id,
            'title' => $input['title'],
            'contributor' => $input['contributor'],
            'body' => $input['body'],
            'category' => $input['category'],
            'tag' => $input['tag'],
            'fig_name' => $fig_name,
            'fig_mime' => $fig_mime
        ]);
        \Session::flash('flash_message', '記事を作成しました。');
        return redirect('/');
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
        $comments = Post::find($id)->comments;
        $tags = explode(",", Post::find($id)->tag);
        return view('show', compact('post', 'comments', 'tags'));
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
