<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetPostsRequest;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\GetPostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GetPostsRequest $request)
    {
        $posts = Post::orderBy('published_at', $request->getSort())->paginate();

        return view('posts.index', [
            'posts' => $posts,
            'sort' => $request->getSort(),
        ]);
    }
}
