<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('user.pages.posts.index');
    }

    public function getList()
    {
        return Post::latest()->paginate(10);
    }
}
