<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostDeleteRequest;
use App\Http\Resources\PostsCollection;
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
        $per_page = request()->has('per_page') ? request()->get('per_page') : 10;

        return new PostsCollection(
            Post::latest()->paginate($per_page)
        );
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.pages.posts.create');
    }

    /**
     * Show
     */
    public function show(Post $post)
    {
        return view('admin.pages.posts.show', compact('post'));
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


    /**
     * Delete
     */
    public function destroy(Post $post, PostDeleteRequest $request)
    {
        try {
            $request->delete($post);

            return response()->json([
                'message' => "Post deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong while deleting the post!",
                'error' => $th->getMessage(),
            ]);
        }
    }
}
