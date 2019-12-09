<?php

namespace App\Http\Controllers;

use App\la_applications_model;
use App\la_details_model;
use App\la_order_model;
use App\la_tempdetails_order_model;
use App\la_temporder_model;
use Illuminate\Http\Request;


class Admin_controller extends Controller
{
    public function publishApp(Request $request){

        $application = new la_applications_model();
        $application->app_name = $request->app_name;
        $application->app_icon = "";
        $application->dev_name = $request->developer_name;
        $application->price = $request->app_price;
        $application->save();

        return Response([
            'status' => 'Success',
        ]);
    }
    public function updateApp(Request $request){
        $application = la_applications_model::find($request->app_id);
        $application->app_name = $request->app_name;
        $application->app_icon = "";
        $application->dev_name = $request->developer_name;
        $application->price = $request->app_price;
        $application->save();

        return Response([
            'status' => 'Success'
        ]);
    }
    public function deleteApp(Request $request){
        $application = la_applications_model::find($request->id_apps);
        $application->delete();

        return Response([
            'status' => 'Success'
        ]);
    }
    public function validation(){
        return view('Admin.validationPage');
    }public function pvalidation(Request $request){
        $paymentcode = $request->input('paymentcode');
        
        $la_temporder = la_temporder_model::where('payment_code', $paymentcode)->first();

        $la_tempdetails = la_tempdetails_order_model::where('id_temporder', $la_temporder->id_temporder)->get();
    
        $la_order = new la_order_model();
        $la_order->id_order = $la_temporder->id_temporder;
        $la_order->email = $la_temporder->email;
        $la_order->date_order = $la_temporder->date_temporder;
        $la_order->save();

        foreach ($la_tempdetails as $lt) {
            $la_details = new la_details_model();
            $la_details->app_id = $lt->app_id;
            $la_details->id_order = $lt->id_temporder;
            $la_details->save();
        }

        return redirect('/validation')->with('Success', 'Transaksi Berhasil');
        
    }
}
