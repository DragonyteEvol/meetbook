<?php

namespace App\Http\Controllers;

use App\LikeDislike;
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

			//COMPROBACION DE PRIMERA ENTRADA
			if(Auth::user()->first){
				return view('first')->with('countries',DB::table('countries')->select('country','iso')->get());
			}
			if(Auth::user()->unfollow){
				$unfollows=DB::table('relations')->where('user_id',Auth::user()->id)->select('target_id')->take(20)->get()->toArray();	
				$unfollow=array(0);
				foreach($unfollows as $un){
					array_push($unfollow,$un->target_id);
				}
				array_push($unfollow,Auth::user()->id);
				$users=DB::table('users')->whereNotIn('id',$unfollow)->where('first',false)->get();
				return view('first_follow')->with('users',$users);
			}

			//INICIO NORMAL
			$relations = Relation::where('user_id',Auth::user()->id)->select('target_id')->get();
			$relations->push(['target_id'=>Auth::user()->id]);
			$reviews = DB::table('posts')->join('users','users.id','=','posts.user_id')
				->leftJoin('books','books.id','=','posts.book_id')
				->leftJoin('authors','authors.id','=','books.id_author')
				->leftJoin('post_data_extra','post_data_extra.post_id','=','posts.id')
				->whereIn('posts.user_id',$relations)
				->select('posts.*','users.name as user_name','users.image as user_image','users.id as user_id','books.title','books.image','books.synopsis','authors.name','authors.id as author_id','target_id','post_data_extra.dislike as dislikes','post_data_extra.comment as comments','post_data_extra.like as likes')
				->orderBy('created_at','desc')
				->paginate(10);
			$like_dislikes=LikeDislike::where('user_id',Auth::user()->id)->select('like','post_id')->get();
			foreach($reviews as $review){
				foreach($like_dislikes as $like_dislike){
					if($like_dislike->post_id==$review->id){
						$review->like=$like_dislike->like;
					}	
				}
			}
			return view('home')->with('reviews',$reviews);
		}
	}

	public function profile(){
		return view('profile')->with('data',User::findOrFail(Auth::user()->id));
	}

	public function editFirstData(Request $request){
		if(Auth::user()->first){
			$user=User::findOrFail(Auth::user()->id);
			$user->country=$request->country;
			$user->website=$request->website;
			$user->description=$request->description;
			$user->first=false;
			$user->save();
			return redirect('/home');
		}else{
			return redirect('/home');
		}
	}

	public function already(){
		if(Auth::user()->unfollow){
			$user=User::findOrFail(Auth::user()->id);
			$user->unfollow=false;
			$user->save();
			return redirect('/home')->with('message','Bienvenido a Meetbook');
		}else{
			return redirect('/home');
		}
	}
}
