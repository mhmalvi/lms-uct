<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentPage()
    {
        return view('pages.payment');
    }

    public function makePayPalPayment(Request $request)
    {
        // return $request->all();

        $order = Order::create($request->all());

        if($order){
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
        // return $request->all();

        $order = Order::create($request->all());

        if($order){
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
