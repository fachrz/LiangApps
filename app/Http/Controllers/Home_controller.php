<?php

namespace App\Http\Controllers;

use App\la_applications_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Home_controller extends Controller
{
    public function index(){

        $applist = la_applications_model::all();
        return view('Homepage', [
            'applist' => $applist
        ]);
    }
    public function appsdata(Request $request){
        $id_apps = $request->id_apps;
        $appsdetail = la_applications_model::where('id_app', $id_apps)->first();

        return response([
            'appsdetail' => $appsdetail,
            'status' => 'Success'
        ]);
        
    }
    public function cart(Request $request){
        $app_id = $request->app_id;

        if (Session::get('status') != 'users') {
            return response([
                'status' => 'loginfirst'
            ]);
        }
    }
}
