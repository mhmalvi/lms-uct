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
        $string = $request->selected_course;
        $str_arr = explode("-", $string);
        $courseFee = $this->fees[$str_arr[0]];

        // $email = $request->email;
        // $password = Str::random(6);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $email,
        //     'password' => bcrypt($password),
        // ]);

        // Session::put('userCredentials', [
        //     'email' => $email,
        //     'password' => $password,
        // ]);

        $token = rand(100000, 999999);
        $form = new EnrollmentForm;
        $form->token = $token;
        $form->course = $request->selected_course;
        $form->form_data = json_encode(
            $request->except([
                '_token'
            ])
        );

        // Mail::to('jakariablaine120@gmail.com')
        //     ->send(
        //         new SendEnrollmentSubmissionMail($request->all())
        //     );

        if ($form->save()) {
            return View("pages.payment", compact('courseFee', "token"));
        } else {
            abort(503);
        }
    }
}
