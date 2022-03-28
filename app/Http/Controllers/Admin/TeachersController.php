<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersCollection;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('admin.pages.teachers.index');
    }

    public function getPaginatedList()
    {
        try {
            return new UsersCollection(
                User::where('user_type', 'teacher')->paginate(request('items'))
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function getRawList()
    {
        try {
            return new UsersCollection(
                User::where('user_type', 'teacher')->get()
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function edit(User $teacher)
    {
        $teacher = (new UserResource($teacher))->jsonSerialize();

        return view('admin.pages.teachers.edit', compact('teacher'));
    }

    public function update(UserUpdateRequest $request, User $teacher)
    {
        $request->update($teacher);

        return response()->json([
            'message' => "Successfully updated the instructor!",
        ], 200);
    }

    public function destroy(User $teacher)
    {
        $teacher->delete();

        return response()->json([
            'message' => "Successfully deleted the instructor!",
        ], 200);
    }
}
