<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\IsAdmin;
use App\User;

class AdminRouteController extends Controller
{
	public function homeAdmin(){
		return IsAdmin::allowAdmin('home');
	}

	//USERS
	public function homeUsers(){
		$users=User::all();
		return IsAdmin::allowAdmin('users')->with('data',$users);
	}

}
