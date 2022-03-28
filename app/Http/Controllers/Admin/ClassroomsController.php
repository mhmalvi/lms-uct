<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Classrooms\RemoveStudentsRequest;
use App\Http\Requests\Admin\Classrooms\RemoveTeachersRequest;
use App\Http\Requests\CreateClassroomRequest;
use App\Http\Requests\DeleteClassroomRequest;
use App\Http\Resources\ClassroomResource;
use App\Http\Resources\ClassroomsCollection;
use App\Models\Classroom;

class ClassroomsController extends Controller
{
    public function store(CreateClassroomRequest $request)
    {
        $request->save();

        return response()->json([
            'message' => "Successfully saved the classroom!",
        ], 200);
    }

    public function getPaginatedList()
    {
        try {
            return new ClassroomsCollection(
                Classroom::paginate(request('items'))
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function show(Classroom $classroom)
    {
        $classroom = (new ClassroomResource($classroom))->jsonSerialize();
        return view('admin.pages.classrooms.show', compact('classroom'));
    }

    public function updateStudents(Classroom $classroom, RemoveStudentsRequest $request)
    {
        try {
            $request->remove($classroom);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json([
            'message' => "Successfully updated the student list!"
        ], 200);
    }

    public function updateTeachers(Classroom $classroom, RemoveTeachersRequest $request)
    {
        try {
            $request->remove($classroom);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return response()->json([
            'message' => "Successfully updated the teacher list!"
        ], 200);
    }

    public function destroy(DeleteClassroomRequest $request, Classroom $classroom)
    {
        try {
            $request->delete($classroom);

            return response()->json([
                'message' => "Successfully deleted the classroom",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $this->error,
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
