<?php

namespace App\Http\Controllers;

use App\la_temporder_model;
use Illuminate\Http\Request;
use RandomLib\Factory;

class Ordercontroller extends Controller
{
    public function payment(Request $request)
    {
        $paymentmethod = $request->input('paymentmethod');

        if ($paymentmethod == "gerai") {
            $factory = new Factory;
            $generator = $factory->getMediumStrengthGenerator();
            $paymentcode = $generator->generateString(10, "1234567890");

            return view('PaymentPage', [
                'paymentcode' => $paymentcode
            ]);
        }
    }
}
