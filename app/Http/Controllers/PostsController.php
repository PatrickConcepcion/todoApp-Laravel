<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    /**r
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $posts = Post::whereUserId($id)->orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, Post $post)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);

        // $validated = $request->validated();

        $post->todoTitle = $request->input('title');
        $post->todoBody = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        // return redirect('/posts')->with('success', 'Todo Added');
        return redirect()->route('posts.index', $post)->with('success', 'Todo Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return view('posts.show')->with('post', $post);
        return view('posts.show')->with(compact(['post']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with(compact(['post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        // $validated = $request->validated();

        $post->todoTitle = $request->input('title');
        $post->todoBody = $request->input('body');
        $post->save();

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts')->with('success', 'Todo Deleted');
    }
}
