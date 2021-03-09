<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetPostsRequest;

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
        $posts = $request->user()->posts()
            ->with('user')
            ->orderBy('published_at', $request->getSort())
            ->paginate()
            ->withQueryString();

        return view('user.posts.index', [
            'posts' => $posts,
            'sort' => $request->getSort(),
        ]);
    }
}
