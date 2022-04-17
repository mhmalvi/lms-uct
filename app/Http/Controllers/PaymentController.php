<?php

namespace App\Http\Controllers;

use App\Mail\SendEnrollmentSubmissionMail;
use App\Models\Order;
use App\Uploads\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function paymentPage()
    {
        return view('pages.payment');
    }

    public function makePayPalPayment(Request $request)
    {
        return $request->all();

        $order = Order::create($request->all());

        if ($order) {
            return response()->json([
                'status' => 'completed',
                'messaage' => "Thank you for your payment!"
            ]);
        } else {

            return response()->json([
                'status'    => 'completed',
                'messaage'  => "Opps! Payment failed"
            ]);
        }
    }

    public function makeBankPayment(Request $request)
    {
        // dd($request->all());\

        $options         = FileUpload::setOptions(null, Certificate::class, 'store', 'paymentSlip', 'uploads/slip');
        $file            = new FileUpload($request, $options);
        $fileName        = $file->imgProcess();
        $data = $request->all();
        $data['paymentSlip'] = $fileName;
        $order = Order::create($data);

        Mail::to('dev.quadque@gmail.com')->send(new SendEnrollmentSubmissionMail());

        if ($order) {
            return response()->json([
                'status'    => 'completed',
                'uid'       => $order->uid,
                'messaage'  => "Thank you for your payment!"
            ]);
        } else {
            return response()->json([
                'status'    => 'completed',
                'uid'       => $order->uid,
                'messaage'  => "Opps! Payment failed"
            ]);
        }
    }




    public function success()
    {
        return view('pages.payment-success');
    }
}
