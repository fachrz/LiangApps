<?php

namespace App\Http\Controllers;

use App\la_applications_model;
use App\la_cart_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Home_controller extends Controller
{
    public function index(){

        $applist = la_applications_model::all();
        return view('Homepage', [
            'applist' => $applist,
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
    public function cartlist(){
        $email = Session::get('email');
        $cartlist = la_cart_model::with('application')->where('email', $email)->get();
        
        $items = array();
        foreach($cartlist as $cl) {
            $items[] = $cl->application->price;
        }

        $totalprice = array_sum($items);
        return view('CartPage',[
            'cartlist' => $cartlist,
            'totalprice' => $totalprice
        ]);
    }
    public function addcart(Request $request){
        $app_id = $request->app_id;
        $email = Session::get('email');
        

        if (Session::get('status') != 'users') {
            return response([
                'status' => 'loginfirst'
            ]);
        } else {
            $cartcheck = la_cart_model::where('app_id', $app_id)->first();
            if ($cartcheck) {
                return response([
                    'status' => 'incart'
                ]);
            }else {
                $cart = new la_cart_model();
                $cart->app_id = $app_id;
                $cart->email = $email;
                $cart->save();
    
                return response([
                    'status' => 'Success',
                ]);
            }
        }
    } 
    public function cartdelete($id){
        $email = Session::get('email');
        $cart = la_cart_model::where([
            ['app_id', $id],
            ['email', $email]
        ]);
        $cart->delete();

        return redirect('/cart');
    }

    public function howmanycart(Request $request){
        $email = Session::get('email');

        $cart = la_cart_model::where('email', $email);
        $howmanycart = $cart->count();

        return response([
            'status' => 'Success',
            'howmany' => $howmanycart,
        ]);
    }
}
