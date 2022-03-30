<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Models\Post;
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

    public function getList()
    {
        return Post::paginate(10);
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
    public function store(PostCreateRequest $request)
    {
        try {
            $request->save();

            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
