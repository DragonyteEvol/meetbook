<?php

namespace App\Http\Controllers;

use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
	public function showProfile(){
		$reviews= DB::table('posts')->where('target_id','=',Auth::user()->id)->leftJoin('books','books.id','=','posts.book_id')->leftJoin('authors','authors.id','=','books.id_author')->select('posts.*','books.title','books.synopsis','books.image','authors.name')->orderBy('created_at','desc')->get();
		$favorites=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',Auth::user()->id)->where('library','=',4)->select('books.title','books.image','books.id')->take(2)->get();
		$reads=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',Auth::user()->id)->where('library','=',3)->select('books.title','books.image','books.id')->take(2)->get();
		$readings=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',Auth::user()->id)->where('library','=',2)->select('books.title','books.image','books.id')->take(2)->get();
		$followers = DB::table('relations')->join('users','users.id','=','relations.user_id')->where('target_id','=',Auth::user()->id)->select('relations.user_id','users.image','users.name')->take(8)->get();
		$follows = DB::table('relations')->join('users','users.id','=','relations.target_id')->where('user_id','=',Auth::user()->id)->select('relations.target_id','users.image','users.name')->take(8)->get();
		return view('show_profile')->with('reviews',$reviews)->with('favorites',$favorites)->with('reads',$reads)->with('readings',$readings)->with('followers',$followers)->with('follows',$follows);
	}
}
