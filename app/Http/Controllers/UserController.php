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
		return view('show_user')->with('data',User::findOrFail($id))->with('reviews',$reviews)->with('follow_check',$follow_check);
	}
}
