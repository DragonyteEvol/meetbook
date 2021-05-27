<?php

namespace App\Http\Controllers;

use App\FriendProcess;
use App\LikeDislike;
use App\Relation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function showUser($id){
		if(Auth::user()->id==$id){
			return redirect('/show/profile/');
		}
		$reviews= DB::table('posts')
			->where('target_id','=',$id)
			->leftJoin('books','books.id','=','posts.book_id')
			->leftJoin('authors','authors.id','=','books.id_author')
			->leftJoin('users','users.id','=','posts.user_id')
			->leftJoin('post_data_extra','post_data_extra.post_id','=','posts.id')
			->select('posts.*','books.title','books.synopsis','books.image','authors.name','users.name as name_user','users.image as image_user','authors.id as author_id','post_data_extra.dislike as dislikes','post_data_extra.comment as comments','post_data_extra.like as likes')->orderBy('created_at','desc')->get();
		$like_dislikes=LikeDislike::where('user_id',Auth::user()->id)->select('like','post_id')->get();
		foreach($reviews as $review){
			foreach($like_dislikes as $like_dislike){
				if($like_dislike->post_id==$review->id){
					$review->like=$like_dislike->like;
				}	
			}
		}

		//FOLLOW CHECK
		if(count(DB::table('relations')->where('user_id','=',Auth::user()->id)->where('target_id','=',$id)->get())==0){
			$follow_check=['message'=>'Seguir','class'=>'btn btn-primary form-control'];
		}else{
			$follow_check=['message'=>'Dejar de seguir','class'=>'btn btn-danger form-control'];
		}
		//FRIEND CHECK
		if(count(FriendProcess::where('sender_id','=',Auth::user()->id)->where('target_id','=',$id)->get())==1 || count(FriendProcess::where('target_id','=',Auth::user()->id)->where('sender_id','=',$id)->get())==1){
			$friend_check=['message'=>'Cancelar solicitud','class'=>'btn btn-info form-control'];
		}else{
			if(count(Relation::where('user_id','=',Auth::user()->id)->where('target_id','=',$id)->where('friend','=',true)->get())==1 || count(Relation::where('target_id','=',Auth::user()->id)->where('user_id','=',$id)->where('friend','=',true)->get())==1){
				$friend_check=['message'=>'Eliminar amigo','class'=>'btn btn-danger form-control'];
			}else{
				$friend_check=['message'=>'Añadir amigo','class'=>'btn btn-primary form-control'];
			}
		}

		//BOOKS
		$favorites=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',$id)->where('library','=',4)->select('books.title','books.image','books.id')->take(2)->get();
		$reads=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',$id)->where('library','=',3)->select('books.title','books.image','books.id')->take(2)->get();
		$readings=DB::table('libraries')->join('books','books.id','=','libraries.book_id')->where('user_id','=',$id)->where('library','=',2)->select('books.title','books.image','books.id')->take(2)->get();

		//RELATIONS
		$followers = DB::table('relations')->join('users','users.id','=','relations.user_id')->where('target_id','=',$id)->where('follow',true)->select('relations.user_id','users.image','users.name')->take(4)->get();
		$followers_count = count(DB::table('relations')->join('users','users.id','=','relations.user_id')->where('target_id','=',$id)->where('follow',true)->select('relations.user_id','users.image','users.name')->take(4)->get());
		$follows = DB::table('relations')->join('users','users.id','=','relations.target_id')->where('user_id','=',$id)->where('follow',true)->select('relations.target_id','users.image','users.name')->take(8)->get();
		$follows_count = count(DB::table('relations')->join('users','users.id','=','relations.target_id')->where('user_id','=',$id)->where('follow',true)->select('relations.target_id','users.image','users.name')->take(8)->get());
		$friends= DB::table('friends')->join('users','users.id','=','friends.user_b')->where('friends.user_a','=',$id)->select('users.image','users.name','users.id','friends.created_at')->take(8)->get();
		$friends_count= count(DB::table('friends')->join('users','users.id','=','friends.user_b')->where('friends.user_a','=',$id)->select('users.image','users.name','users.id','friends.created_at')->take(8)->get());

		//RETURN
		return view('show_user')
			->with('data',User::findOrFail($id))
			->with('reviews',$reviews)
			->with('follow_check',$follow_check)
			->with('followers',$followers)
			->with('follows',$follows)
			->with('favorites',$favorites)
			->with('reads',$reads)
			->with('readings',$readings)
			->with('friend_check',$friend_check)
			->with('friends',$friends)
			->with('followers_count',$followers_count)
			->with('follows_count',$follows_count)
			->with('friends_count',$friends_count);
	}


	public function showFormEdit(){
			return view('components.form_edit_user');
	}

	public function editDataUser(Request $request){
		$user=User::findOrFail(Auth::user()->id);
		$user->website=$request->website;
		$user->description=$request->description;
		$user->save();
		return back()->with('message','Datos actualizados');
	}

	public function editImage(Request $request){
		$request->validate([
			'image' => 'required',
		]);
		unlink(public_path()."/users_image/".Auth::user()->image);
		if($file=$request['image']){
			$name=Auth::user()->email . '.' . $file->getClientOriginalExtension();
			$file->move('users_image',$name);
		}
		$user=User::findOrFail(Auth::user()->id);
		$user->image=$name;
		$user->save();
		return back()->with('message','Datos guardados');
	}
}
