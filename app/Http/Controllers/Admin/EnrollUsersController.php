<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;

class EnrollUsersController extends Controller
{
    public function index()
    {
        return view('admin.pages.enroll_users.index');
    }

    public function store(UserCreateRequest $request)
    {
        $request->save();

        return response()->json([
            'message' => "Successfully created the user!",
        ], 200);
    }
}
