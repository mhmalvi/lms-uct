<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\EnrollmentForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SendEnrollmentSubmissionMail;
use App\Http\Controllers\PDFGenerateController;
use App\Http\Requests\EnrollmentRequest;

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

    public function store(EnrollmentRequest $request)
    {
        $selectedCourse = $request->selected_course;
        $str_arr = explode("-", $selectedCourse);
        $courseFee = 0;

        if (array_key_exists($str_arr[0], $this->fees)) {
            $courseFee = $this->fees[trim($str_arr[0])];
        }

        $token = rand(100000, 999999);
        $form = new EnrollmentForm;
        $form->token = $token;
        $form->course = $request->selected_course;
        $form->form_data = json_encode(
            $request->except([
                '_token',
            ])
        );

        $form->save();

        return View("pages.payment", compact('courseFee', "token", "selectedCourse"));
    }
}
