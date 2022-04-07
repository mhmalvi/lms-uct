<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Mail\SendEnrollmentSubmissionMail;
use App\Models\EnrollmentForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EnrollmentsController extends Controller
{
    public function index()
    {
        return view('pages.enrollments.index');
    }

    public function store(EnrollmentRequest $request)
    {
        // exploding from 'code - title' into ['code', '-', 'title']
        $_temp = explode(' ', $request->selected_course);
        $course_code = $_temp[0];
        unset($_temp[0]);
        unset($_temp[1]);
        $course_title = implode(' ', $_temp);

        $email = $request->email;
        $password = Str::random(6);

        User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        Session::put('userCredentials', [
            'email' => $email,
            'password' => $password,
        ]);

        $form = new EnrollmentForm;

        $form->uid = rand(100000, 999999);
        $form->course_code = $course_code;
        $form->course_title = $course_title;
        $form->form_data = json_encode(
            $request->except([
                '_token',
                'selected_course',
            ])
        );

        Mail::to('jakariablaine120@gmail.com')
            ->send(
                new SendEnrollmentSubmissionMail(
                    $request->all()
                )
            );

        if ($form->save()) {
            return redirect()->to("/payment/" . $form->uid);
        } else {
            abort(503);
        }


        if ($course_code == 'HLTAID003') {
            Session::put('enrolled_form_id', $form->id);
        }

        // if ($course_code == 'HLTAID003') {
        //     // Session::put('enrolled_form_id', $form->id);

        //     return redirect()->to("/payment/".$form->uid);
        // }

        return redirect()->route("learnque");
    }
}
