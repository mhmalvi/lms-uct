<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassroomMembersCollection;
use App\Models\Classroom;
use App\Models\ClassroomMember;
use Illuminate\Http\Request;

class ClassroomMembersController extends Controller
{
    public function getStudents(Classroom $classroom)
    {
        $students = ClassroomMember::with('user')
            ->where('classroom_id', $classroom->id)
            ->get()
            ->filter(function ($res) {
                return $res->user->user_type == 'student';
            });

        try {
            return new ClassroomMembersCollection($students);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 503);
        }
    }
}
