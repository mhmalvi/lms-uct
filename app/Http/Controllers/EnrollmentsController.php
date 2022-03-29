<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{
    public function index()
    {
        return view('pages.enrollments.index');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
