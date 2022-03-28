<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classroom\PostCreateRequest;
use App\Http\Resources\ClassroomPostsCollection;
use App\Models\Classroom;
use App\Models\ClassroomPost;
use Illuminate\Http\Request;

class ClassroomPostsController extends Controller
{
    public function getPaginatedList(Classroom $classroom)
    {
        try {
            return new ClassroomPostsCollection(
                ClassroomPost::with('attachments')->where('classroom_id', $classroom->id)
                    ->latest()->paginate(request('items'))
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function store(PostCreateRequest $request)
    {
        $request->save();

        return response()->json([
            'message' => "Successfully published the post!"
        ], 200);
    }
}
