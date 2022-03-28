<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClassroomMembersCollection;
use App\Http\Resources\UsersCollection;
use App\Models\Classroom;
use App\Models\ClassroomMember;
use Illuminate\Http\Request;

class ClassroomMembersController extends Controller
{
    public function store(Request $request)
    {
        $usernames = $request->users;
        $users = User::whereIn('name', $usernames)->get();
        $classroom = Classroom::where('unique_id', $request->classroom_id)->first();

        // adding multiple teacher in a classroom is disabled for now.
        // if the request is from add-teacher component
        if ($users[0]->user_type == 'teacher') {
            foreach ($classroom->members as $member) {
                if ($member->user->user_type == 'teacher') {
                    // if found an existing teacher in the classroom, abort this action
                    return response()->json([
                        'message' => "A teacher is already added to the classroom. You can't add more than 1 teacher!"
                    ], 400);
                    // ----
                }
            }
        }

        foreach ($users as $user) {

            if (
                ClassroomMember::where('user_id', $user->id)->count() == 0 // check if user is already added
            ) {
                // if the user is not added, add them in member list. otherwise, ignore
                ClassroomMember::create([
                    'classroom_id' => $classroom->id,
                    'user_id' => $user->id,
                ]);
            }
        }

        return response()->json([
            'message' => "Successfully added the user(s) to the classroom!"
        ], 200);
    }

    public function getTeachers(Classroom $classroom)
    {
        $teachers = ClassroomMember::with('user')
            ->where('classroom_id', $classroom->id)
            ->get()
            ->filter(function ($res) {
                return $res->user->user_type == 'teacher';
            });

        try {
            return new ClassroomMembersCollection($teachers);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 503);
        }
    }
}
