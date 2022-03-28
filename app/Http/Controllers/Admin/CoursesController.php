<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCreateRequest;
use App\Http\Requests\Admin\CourseUpdateRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CoursesCollection;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.courses.index');
    }

    public function getPaginatedList()
    {
        return new CoursesCollection(
            Course::latest()->paginate(request('items'))
        );
    }

    public function getRawList()
    {
        return new CoursesCollection(
            Course::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCreateRequest $request)
    {
        try {
            $request->save();

            return response()->json([
                'message' => "Successfully created the course!",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 503);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course = new CourseResource($course);
        return view('admin.pages.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        try {
            $old_code = $course->code;
            $course = $request->update($course);

            return response()->json([
                'message' => "Successfully updated the course!",
                'refresh' => $old_code == $course->code ? false : true,
                'refresh_link' => route('admin.courses.edit', ['course' => $course->code]),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([
            'message' => "You have successfully deleted the server!",
        ], 200);
    }
}
