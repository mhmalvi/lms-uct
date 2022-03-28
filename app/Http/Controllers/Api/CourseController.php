<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoursesCollection;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        if (request()->filled('items')) {
            return new CoursesCollection(
                Course::paginate(request('items'))
            );
        } else {
            return new CoursesCollection(
                Course::all()
            );
        }
    }
}
