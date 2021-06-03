<?php

namespace App\Http\Controllers;

use App\Book;
use App\Calification;
use App\LikeDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
	public function showBook($id){
		$book=Book::findOrFail($id);
		$libraries=DB::table('libraries')->where('user_id',Auth::user()->id)->where('book_id',$id)->select('library')->get();
		if($book->saga==true){
			$relations=Book::where('name_saga','=',$book->name_saga)->take(4)->get();
		}else{
			$relations=[];
		}
		$reviews=DB::table('posts')
			->where('book_id','=',$id)
			->join('users','users.id','=','posts.user_id')
			->leftJoin('post_data_extra','post_data_extra.post_id','=','posts.id')
			->select('posts.*','users.name','users.image','post_data_extra.like as likes','post_data_extra.dislike as dislikes','post_data_extra.comment as comments')
			->paginate(5);
		$like_dislikes=LikeDislike::where('user_id',Auth::user()->id)->select('like','post_id')->get();
		foreach($reviews as $review){
			foreach($like_dislikes as $like_dislike){
				if($like_dislike->post_id==$review->id){
					$review->like=$like_dislike->like;
				}	
			}
		}
		$califications=DB::table('califications')->where('book_id',$id)->get();

		return view('show_book')->with('data',DB::table('books')->join('authors','authors.id','=','books.id_author')->where('books.id',$id)->select('books.*','authors.name')->get())->with('genres',$book->genres)->with('relations',$relations)->with('reviews',$reviews)->with('califications',Calification::where('book_id','=',$id)->get())->with('libraries',$libraries)->with('califications',$califications);
	}


	public function showSaga($name){
		$books=DB::table('books')->join('authors','authors.id','=','books.id_author')->where('name_saga','=',$name)->select('books.id','books.image','books.title','authors.name')->get();
		return view('search')->with('books',$books);
	}
}
