<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//ROUTES PROTEGIDAS
Route::group(['middleware'=>'auth'],function(){
	Route::get('/home','RouteController@home');
});


//ROUTES ADMIN SUPERSUPROTECTED
Route::group(['middleware'=>'auth'],function(){
	Route::get('admin/home','AdminRouteController@homeAdmin');

	//USERS

	Route::get('admin/users','AdminRouteController@homeUsers');
});
