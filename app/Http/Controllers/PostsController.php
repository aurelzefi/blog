<?php

namespace App\Http\Controllers;

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
        $posts = Post::with('user')
            ->orderBy('published_at', $request->getSort())
            ->paginate()
            ->withQueryString();

        return view('posts.index', [
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
        return view('posts.create');
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

        return redirect()->route('posts.index');
    }
}
