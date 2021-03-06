<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('index')->with('posts', $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $posts = new Post();
        Post::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'author' => $request->author,
            'user_id' => Auth::id(),
        ]);
        if ($posts) {
            return redirect()->route('posts.index')->with('success', trans('label.successfully'));
        }

        return redirect()->route('posts.index')->with('fail', trans('label.error'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $posts = Post::findOrFail($id);
        $posts->update($request->all());
        if ($posts) {
            return redirect()->route('posts.index')->with('success', trans('label.success'));
        }

        return redirect()->route('posts.edit', $id)->with('fail', trans('label.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('posts.index');
    }

    public function changeLanguage(Request $request)
    {
       $lang = $request->language;
       if ($lang != 'en' && $lang != 'vi') {
           $lang = config('app.locale');
       }
       Session::put('language', $lang);

       return redirect()->back();
    }
}
