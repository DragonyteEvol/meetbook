<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
	public function home(){
		$data=User::findOrFail(Auth::user()->id);
		if(Auth::user()->admin){
			return redirect('admin/home')->with('data',$data);
		}else{
			return view('home')->with('data',$data);
		}
	}

	public function profile(){
		return view('profile')->with('data',User::findOrFail(Auth::user()->id));
	}
}
