<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::allPost();
        return view('post.index')->with('posts', $posts);
    }
    public function create()
    {

        return view('post.create');
    }
}
