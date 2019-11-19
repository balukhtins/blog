<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Post $posts):View
    {
        return view('admin.posts.index',['posts' => $posts->getAll($request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create',[
            'published_status' => config('custom.enum.published_status'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        return $post->create($request->only(['title','short_description','body','published_status']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post,
            'published_status' => config('custom.enum.published_status')
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return bool
     */
    public function update(Request $request, Post $post)
    {
        return (string) $post->update($request->only(['title','short_description','body','published_status']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        return response()->json([
            'data' => $post->getAll($request)
        ]);
    }
}
