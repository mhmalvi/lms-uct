<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentPage()
    {
        return view('pages.payment');
    }
}
