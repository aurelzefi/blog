<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetPostsRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\GetPostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(GetPostsRequest $request)
    {
        $posts = Post::orderBy('published_at', $request->getSort())->paginate();

        return view('user.posts.index', [
            'posts' => $posts,
            'sort' => $request->getSort(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $request->user()->posts()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'published_at' => now(),
        ]);

        return redirect()->route('user.posts');
    }
}
