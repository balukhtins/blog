<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @param Post $posts
     * @return View
     */
    public function index(Request $request, Post $posts):View
    {
        return view('posts.index',['posts' => $posts->getAll($request)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function getPostsByAuthor(int $user_id, Post $posts, User $user,Request $request){
        return view('posts.index',['posts' => $posts->postByAuthor($user->find($user_id),$request)]);
    }

}
