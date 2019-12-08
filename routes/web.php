<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Home_controller@index');
Route::get('/login', 'Authcontroller@showLoginPage');
Route::get('/register', 'Authcontroller@showRegisterPage');
Route::post('/registerAction', 'Authcontroller@registerAction');
Route::post('/loginAction', 'Authcontroller@loginAction');
Route::get('/logout', 'Authcontroller@logout');

Route::get('/admin', 'Authcontroller@adminLoginPage');
Route::post('/adminLoginAction', 'Authcontroller@adminLoginAction');
Route::get('/dashboard', 'Admin_controller@dashboard');

Route::post('/payment', 'Ordercontroller@payment');

Route::get('/appsdata', 'Home_controller@appsdata');

// Api
Route::post('/publishapp', 'Admin_controller@publishApp');
Route::post('/deleteapp', 'Admin_controller@deleteApp');
Route::post('/updateapp', 'Admin_controller@updateApp');
Route::post('/cart', 'Home_controller@cart');
