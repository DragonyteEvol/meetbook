<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
	public function showBook($id){
		return view('show_book')->with('data',DB::table('books')->join('authors','authors.id','=','books.id_author')->where('books.id',$id)->select('books.*','authors.name')->get());
	}
}
