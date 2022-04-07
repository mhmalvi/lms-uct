<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\EnrollmentForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EnrollmentRequest;
use Illuminate\Support\Facades\Redirect;
use App\Mail\SendEnrollmentSubmissionMail;

class EnrollmentsController extends Controller
{
    private $fees = [
        "HLTAID009" => 80,
        "HLTAID011" => 130,
        "HLTAID012" => 150,
        "CPCCWHS1001" => 140,
        "SITHFABO02" => 160,
        "SITHGAM001" => 120
    ];

    public function index()
    {
        return view('pages.enrollments.index');
    }

    public function store(Request $request)
    {
        $string = $request->selected_course;
        $str_arr = explode("-", $string);
        $courseFee = $this->fees[$str_arr[0]];

        $form = new EnrollmentForm;
        $form->token = rand(100000, 999999);
        $form->course = $request->selected_course;
        $form->form_data = json_encode(
            $request->except([
                '_token',
                'selected_course',
            ])
        );

        if ($form->save()) {
            return View("pages.payment", compact('courseFee'));
        } else {
            abort(503);
        }
    }
}
