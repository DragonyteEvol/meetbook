<?php

namespace App\Http\Controllers;

use App\Comment;
use App\LikeDislike;
use App\Notifications\CommentNotification;
use App\Notifications\LikeNotification;
use Illuminate\Http\Request;
use App\Post;
use App\PostDataExtra;
use App\PostMuch;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
	public function storePost($id,Request $request){
		$new=['user_id'=>Auth::user()->id,'target_id'=>$id,'description'=>nl2br($request->description),'type'=>2];
		Post::create($new);
		return redirect()->back();
	}

	public function showComments(Request $request){
		$data=DB::table('comments')->join('users','users.id','comments.user_id')->where('comments.post_id',$request->id_post)->select('comments.id','comments.description','users.name','users.image','users.id as user_id','comments.created_at')->take(5)->get();
		return response(json_encode($data));
		
	}

	public function commentPost(Request $request,$id){
		$comment=Comment::create(['post_id'=>$id,'user_id'=>Auth::user()->id,'description'=>$request->description]);
		$post=Post::findOrFail($id);
		if($post->user_id==Auth::user()->id){
		}else{
		$user=User::findOrFail($post->user_id);
		$user->notify(new CommentNotification($comment));
		}
		$check=PostDataExtra::where('post_id',$id)->get();
		if(count($check)>0){
			$comments=PostDataExtra::findOrFail($check[0]->id);
			$comments->comment=$comments->comment+1;
			$comments->save();
		}else{
			PostDataExtra::create(['post_id'=>$id,'comment'=>1]);
		}
		return back()->with('message','Comentado Exitosamente');
	}

	public function likePost(Request $request){
		$check=LikeDislike::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->where('like',true)->get();
		$extra=PostDataExtra::where('post_id',$request->post_id)->get();
		if(count($check)>0){
			LikeDislike::findOrFail($check[0]->id)->delete();
			$likes=PostDataExtra::findOrFail($extra[0]->id);
			$likes->like=$likes->like-1;
			$likes->save();
			return response(json_encode(false));
		}else{
			LikeDislike::create(['user_id'=>Auth::user()->id,'post_id'=>$request->post_id,'like'=>true]);
			/*$post=Post::findOrFail($request->post_id);
			if($post->user_id==Auth::user()->id){
			}else{
			$user=User::findOrFail($post->user_id);
			$user->notify(new LikeNotification($post));
			}**/
			$dislike=LikeDislike::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->where('like',false)->get();
			
			if(count($dislike)>0){
				LikeDislike::findOrFail($dislike[0]->id)->delete();
				$dislikes=PostDataExtra::findOrFail($extra[0]->id);
				$dislikes->dislike=$dislikes->dislike-1;
				$dislikes->save();
			}

			if(count($extra)>0){
				$likes=PostDataExtra::findOrFail($extra[0]->id);
				$likes->like=$likes->like+1;
				$likes->save();
			}else{
				PostDataExtra::create(['post_id'=>$request->post_id,'like'=>1]);
			}
			return response(json_encode(true));
		}
	}

	public function dislikePost(Request $request){
		$check=LikeDislike::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->where('like',false)->get();
		$extra=PostDataExtra::where('post_id',$request->post_id)->get();
		if(count($check)>0){
			LikeDislike::findOrFail($check[0]->id)->delete();
			$likes=PostDataExtra::findOrFail($extra[0]->id);
			$likes->dislike=$likes->dislike-1;
			$likes->save();
			return response(json_encode(false));
		}else{
			$dislike=LikeDislike::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->where('like',true)->get();
			
			if(count($dislike)>0){
				LikeDislike::findOrFail($dislike[0]->id)->delete();
				$dislikes=PostDataExtra::findOrFail($extra[0]->id);
				$dislikes->like=$dislikes->like-1;
				$dislikes->save();
			}

			LikeDislike::create(['user_id'=>Auth::user()->id,'post_id'=>$request->post_id,'like'=>false]);
			if(count($extra)>0){
				$likes=PostDataExtra::findOrFail($extra[0]->id);
				$likes->dislike=$likes->dislike+1;
				$likes->save();
			}else{
				PostDataExtra::create(['post_id'=>$request->post_id,'dislike'=>1]);
			}
			return response(json_encode(true));
		}
	}

	public function showPost($id){
		$comments=DB::table('comments')->join('users','users.id','=','comments.user_id')->where('post_id',$id)->select('comments.*','users.image','users.name')->orderBy('created_at','desc')->get();
		$reviews= DB::table('posts')->where('posts.id','=',$id)->leftJoin('books','books.id','=','posts.book_id')->leftJoin('authors','authors.id','=','books.id_author')->leftJoin('users','users.id','=','posts.user_id')->select('posts.*','books.title','books.synopsis','books.image','authors.name','users.name as name_user','users.image as image_user','authors.id as author_id')->orderBy('created_at','desc')->get();
		return view('show_post')->with('reviews',$reviews)->with('comments',$comments);
	}


	public function showPostNotification($id){
		$comments=DB::table('comments')->join('users','users.id','=','comments.user_id')->where('post_id',$id)->select('comments.*','users.image','users.name')->orderBy('created_at','desc')->get();
		$reviews= DB::table('posts')->where('posts.id','=',$id)->leftJoin('books','books.id','=','posts.book_id')->leftJoin('authors','authors.id','=','books.id_author')->leftJoin('users','users.id','=','posts.user_id')->select('posts.*','books.title','books.synopsis','books.image','authors.name','users.name as name_user','users.image as image_user','authors.id as author_id')->orderBy('created_at','desc')->get();
		$user=User::findOrFail(Auth::user()->id);
		$user->unreadNotifications->markAsRead();
		return view('show_post')->with('reviews',$reviews)->with('comments',$comments);
	}
}
