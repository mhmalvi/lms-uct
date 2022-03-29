<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        return view('admin.pages.posts.index');
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.pages.posts.create');
    }

    /**
     * Store
     */
    public function store(Request $request)
    {
        dd($request->all());
    }
}
