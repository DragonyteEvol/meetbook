<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\IsAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSearchController extends Controller
{
	public function searchAutocompleteUsers(Request $request){
		IsAdmin::allowAdminNoView();
		$users=User::where('name','LIKE','%'.$request->text.'%')->select('users.*')->get();
		return IsAdmin::allowAdmin('users')->with('data',$users);
	}

	public function searchAutocompleteBooks(Request $request){
		IsAdmin::allowAdminNoView();
		$data=DB::table('books')->where('title','LIKE','%'.$request->text.'%')->join('authors','books.id_author','=','authors.id')->select('books.*','authors.name')->get();
		//$data=Book::where('title','LIKE','%'.$request->text.'%')->select('books.*')->get();
		return response(json_encode($data));
	}

	public function searchAutocompleteAuthors(Request $request){
		IsAdmin::allowAdminNoView();
		$data=Author::where('name','LIKE','%'.$request->text.'%')->select('authors.*')->get();
		return response(json_encode($data));
	}

	public function searchAutocompleteIdAuthors(Request $request){
		IsAdmin::allowAdminNoView();
		$data=DB::table('authors')->where('name','LIKE','%'.$request->text.'%')->select('authors.id','authors.name')->get();
		return response(json_encode($data));
	}
}
