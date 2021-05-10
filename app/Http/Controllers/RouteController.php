<?php

namespace App\Http\Controllers;

use App\Relation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
	public function home(){
		if(Auth::user()->admin){
			$data=User::findOrFail(Auth::user()->id);
			return redirect('admin/home')->with('data',$data);
		}else{
			$relations = Relation::where('user_id',Auth::user()->id)->select('target_id')->get();
			$relations->push(['target_id'=>Auth::user()->id]);
			$reviews = DB::table('posts')->join('users','users.id','=','posts.user_id')->leftJoin('books','books.id','=','posts.book_id')->leftJoin('authors','authors.id','=','books.id_author')->whereIn('posts.user_id',$relations)->select('posts.*','users.name as user_name','users.image as user_image','users.id as user_id','books.title','books.image','books.synopsis','authors.name')->orderBy('created_at','desc')->paginate(10);
			return view('home')->with('reviews',$reviews);
		}
	}

	public function profile(){
		return view('profile')->with('data',User::findOrFail(Auth::user()->id));
	}
}
