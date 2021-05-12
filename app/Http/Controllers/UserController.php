<?php

namespace App\Http\Controllers;

use App\Relation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function showUser($id){
		$reviews= DB::table('posts')->where('target_id','=',$id)->leftJoin('books','books.id','=','posts.book_id')->leftJoin('authors','authors.id','=','books.id_author')->leftJoin('users','users.id','=','posts.user_id')->select('posts.*','books.title','books.synopsis','books.image','authors.name','users.name as name_user','users.image as image_user')->orderBy('created_at','desc')->get();
		$follow_check= DB::table('relations')->where('user_id','=',Auth::user()->id)->where('target_id','=',$id)->get();
		$favorites=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',$id)->where('library','=',4)->select('books.title','books.image','books.id')->take(2)->get();
		$reads=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',$id)->where('library','=',3)->select('books.title','books.image','books.id')->take(2)->get();
		$readings=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',$id)->where('library','=',2)->select('books.title','books.image','books.id')->take(2)->get();
		$followers = DB::table('relations')->join('users','users.id','=','relations.user_id')->where('target_id','=',$id)->select('relations.user_id','users.image','users.name')->take(8)->get();
		$follows = DB::table('relations')->join('users','users.id','=','relations.target_id')->where('user_id','=',$id)->select('relations.target_id','users.image','users.name')->take(8)->get();
		return view('show_user')->with('data',User::findOrFail($id))->with('reviews',$reviews)->with('follow_check',$follow_check)->with('followers',$followers)->with('follows',$follows)->with('favorites',$favorites)->with('reads',$reads)->with('readings',$readings);
	}
}
