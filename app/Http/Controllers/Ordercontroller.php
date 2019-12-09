<?php

namespace App\Http\Controllers;

use App\la_cart_model;
use App\la_tempdetails_order_model;
use App\la_temporder_model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RandomLib\Factory;

class Ordercontroller extends Controller
{
    public function payment(Request $request)
    {
        $paymentmethod = $request->input('paymentmethod');

        if ($paymentmethod == "gerai") {
            $factory = new Factory;
            $generator = $factory->getMediumStrengthGenerator();
            $paymentcode = "LA".$generator->generateString(10, "1234567890");
            $email = Session::get('email');

            $cart = la_cart_model::where('email', $email);
            $cartlist = $cart->get();

            $temporder = new la_temporder_model();
            $temporder->email = $email;
            $temporder->date_temporder = Carbon::now()->toDateTime();
            $temporder->payment_code = $paymentcode;
            if ($temporder->save()) { 
                foreach ($cartlist as $cl) {
                    $tds = new la_tempdetails_order_model();
                    $tds->app_id = $cl->app_id;
                    $tds->id_temporder = $temporder->id_temporder;
                    $tds->save();
                }
                $cart->delete();
            }
            return view('PaymentPage', [
                'paymentcode' => $paymentcode
            ]);
        }
    }
    public function myorder(){
        $temporder = la_temporder_model::where('email', Session::get('email'))->get();
        return view('myorderPage', [
            'temporder' => $temporder
        ]);
    }
    public function removeOrder($id){
        $temporder = la_temporder_model::where('id_temporder', $id);
        $temporder->delete();

        return redirect('/myorder')->with('Success', 'Order Berhasil di hapus');
    }
    
}
