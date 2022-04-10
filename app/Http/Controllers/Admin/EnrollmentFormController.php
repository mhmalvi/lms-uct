<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnrollmentForm;
use Illuminate\Http\Request;

class EnrollmentFormController extends Controller
{
    public function getEnrolForm()
    {
        $data['enrollments'] = EnrollmentForm::with("order")->paginate(20);

        return view('admin.pages.enrolloment_form', $data);
    }
}
