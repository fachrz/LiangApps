<?php

namespace App\Http\Controllers;

use App\la_applications_model;
use Symfony\Component\HttpFoundation\Request;

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
}
