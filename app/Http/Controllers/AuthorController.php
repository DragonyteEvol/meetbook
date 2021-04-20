<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
	public function showAuthor($id){
		$data = Author::findOrFail($id);
		$book = Book::where('id_author',$id)->take(6)->get();
		return view('show_author')->with('data',$data)->with('books',$book);
	}
}
