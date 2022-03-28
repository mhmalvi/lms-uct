<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classroom\PostCreateRequest;
use App\Http\Resources\ClassroomMembersCollection;
use App\Http\Resources\ClassroomPostsCollection;
use App\Http\Resources\UsersCollection;
use App\Models\Classroom;
use App\Models\ClassroomMember;
use Illuminate\Http\Request;

class ClassroomPostsController extends Controller
{
    public function getPaginatedList(Classroom $classroom)
    {
        return new ClassroomPostsCollection(
            $classroom->load('posts.author')->posts()->latest()->paginate(request('items'))
        );
    }

    public function getTeacherList(Classroom $classroom)
    {
        $teachers = ClassroomMember::with('user')
            ->where('classroom_id', $classroom->id)
            ->get()
            ->filter(function ($member) {
                return $member->user->user_type == 'teacher';
            });
        try {
            return new ClassroomMembersCollection($teachers);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 503);
        }
    }
}
