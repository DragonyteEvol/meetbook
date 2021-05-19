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
		$reviews= DB::table('posts')->where('target_id','=',Auth::user()->id)->leftJoin('books','books.id','=','posts.book_id')->leftJoin('authors','authors.id','=','books.id_author')->select('posts.*','books.title','books.synopsis','books.image','authors.name','authors.id as author_id')->orderBy('created_at','desc')->paginate(10);

		//BOOKS
		$favorites=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',Auth::user()->id)->where('library','=',4)->select('books.title','books.image','books.id')->take(2)->get();
		$reads=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',Auth::user()->id)->where('library','=',3)->select('books.title','books.image','books.id')->take(2)->get();
		$readings=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',Auth::user()->id)->where('library','=',2)->select('books.title','books.image','books.id')->take(2)->get();

		//RELATIONS

		$followers = DB::table('relations')->join('users','users.id','=','relations.user_id')->where('target_id','=',Auth::user()->id)->where('follow',true)->select('relations.user_id','users.image','users.name')->take(4)->get();
		$followers_count = count(DB::table('relations')->join('users','users.id','=','relations.user_id')->where('target_id','=',Auth::user()->id)->where('follow',true)->select('relations.user_id','users.image','users.name')->take(4)->get());
		$follows = DB::table('relations')->join('users','users.id','=','relations.target_id')->where('user_id','=',Auth::user()->id)->where('follow',true)->select('relations.target_id','users.image','users.name')->take(8)->get();
		$follows_count = count(DB::table('relations')->join('users','users.id','=','relations.target_id')->where('user_id','=',Auth::user()->id)->where('follow',true)->select('relations.target_id','users.image','users.name')->take(8)->get());
		$friends= DB::table('friends')->join('users','users.id','=','friends.user_b')->where('friends.user_a','=',Auth::user()->id)->select('users.image','users.name','users.id','friends.created_at')->take(8)->get();
		$friends_count= count(DB::table('friends')->join('users','users.id','=','friends.user_b')->where('friends.user_a','=',Auth::user()->id)->select('users.image','users.name','users.id','friends.created_at')->take(8)->get());
		return view('show_profile')
			->with('reviews',$reviews)
			->with('favorites',$favorites)
			->with('reads',$reads)
			->with('readings',$readings)
			->with('followers',$followers)
			->with('follows',$follows)
			->with('friends',$friends)
			->with('followers_count',$followers_count)
			->with('follows_count',$follows_count)
			->with('friends_count',$friends_count);
	}
}