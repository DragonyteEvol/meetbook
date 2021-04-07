<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\IsAdmin;
use App\User;
use Illuminate\Support\Facades\DB;
use Psy\Command\SudoCommand;

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

	public function homeBooks(){
		$data=DB::table('books')->join('authors','authors.id','=','books.id_author')->select('books.*','authors.name as name_author')->get();
		return IsAdmin::allowAdmin('books')->with('data',$data);
	}

	public function insertBook(){
		return IsAdmin::allowAdmin('insert_book');	
	}

}
