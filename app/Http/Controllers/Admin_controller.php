<?php

namespace App\Http\Controllers;

use App\la_applications_model;
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
}
