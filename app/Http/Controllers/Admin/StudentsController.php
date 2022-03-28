<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersCollection;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('admin.pages.students.index');
    }

    public function getPaginatedList()
    {
        try {
            return new UsersCollection(
                User::where('user_type', 'student')->paginate(request('items'))
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function getRawList()
    {
        return new UsersCollection(
            User::where('user_type', 'student')->get()
        );
    }

    public function edit(User $student)
    {
        $student = (new UserResource($student))->jsonSerialize();
        return view('admin.pages.students.edit', compact('student'));
    }

    public function update(UserUpdateRequest $request, User $student)
    {
        $request->update($student);

        return response()->json([
            'message' => "Successfully updated the user"
        ], 200);
    }

    public function destroy(User $student)
    {
        $student->delete();

        return response()->json([
            'message' => "Successfully deleted the student!",
        ], 200);
    }
}
