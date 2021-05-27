<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
	public function searchBookProfileAutocomplete(Request $request){
		$a = DB::table('books')->where('title','LIKE','%'.$request->text.'%')->select('title as name','image','id')->take(5)->get();
		$a->map(function($a){
		$a->type = 1;
		});
		$b = DB::table('authors')->where('name','LIKE','%'.$request->text.'%')->select('name','image','id')->take(5)->get();
		$b->map(function($b){
		$b->type = 2;
		});
		$c = DB::table('users')->where('name','LIKE','%'.$request->text.'%')->select('name','image','id')->take(5)->get();
		$c->map(function($c){
		$c->type = 3;
		});
		return response(json_encode($a->merge($b)->merge($c)));
		}

	public function searchBookProfile(Request $request){
		$books=DB::table('books')->join('authors','authors.id','=','books.id_author')->where('books.title','LIKE','%'.$request->search.'%')->select('books.id','books.image','books.title','authors.name')->paginate(40);
		$authors=DB::table('authors')->where('name','LIKE','%'.$request->search.'%')->select('name','image','id','nacionality')->paginate(5);
		$users= DB::table('users')->where('name','LIKE','%'.$request->search.'%')->select('name','image','id','country')->paginate(5);
		return view('search')->with('books',$books)->with('authors',$authors)->with('users',$users)->with('search_text',$request->search);
	}

	public function searchGenres($genre){
		$this->genre=$genre;
		$books=Book::whereHas('genres', function ($query) {
   			 return $query->where('genre',$this->genre);
		})->join('authors','authors.id','=','books.id_author')
			->select('books.*','authors.name')
    			->get();
		return view('search')->with('books',$books);

	}

	public function searchWithFilters(Request $request){
	$this->genre=$request->genre;
		$books=Book::whereHas('genres', function ($query) {
   			 return $query->where('genre',$this->genre);
		})->where('title','LIKE','%'.$request->text.'%')->join('authors','authors.id','=','books.id_author')
			->select('books.*','authors.name')
    			->get();
	return view('search')->with('books',$books)->with('search_text',$request->text);
	}
}

