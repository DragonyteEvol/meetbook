<?php
namespace App;

use Illuminate\Support\Facades\Auth;

class IsAdmin{
	static function allowAdmin($view){
		if(Auth::user()->admin==false){
			return redirect('home');
		}else{
			return view("admin." . $view);
		}
	}

	static function allowAdminNoView(){
		if(Auth::user()->admin==false){
			return redirect('home');
		}
	}
}
