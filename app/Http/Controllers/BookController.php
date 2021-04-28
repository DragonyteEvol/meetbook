<?php

namespace App\Http\Controllers;

use App\Book;
use App\Calification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
	public function showBook($id){
		$book=Book::findOrFail($id);
		if($book->saga==true){
			$relations=Book::where('name_saga','=',$book->name_saga)->take(7)->get();
		}else{
			$relations=[];
		}
		return view('show_book')->with('data',DB::table('books')->join('authors','authors.id','=','books.id_author')->where('books.id',$id)->select('books.*','authors.name')->get())->with('genres',$book->genres)->with('relations',$relations)->with('reviews',DB::table('reviews')->where('book_id','=',$id)->join('users','users.id','=','reviews.user_id')->select('reviews.*','users.name','users.image')->paginate(5))->with('califications',Calification::where('book_id','=',$id)->get());
	}

}
