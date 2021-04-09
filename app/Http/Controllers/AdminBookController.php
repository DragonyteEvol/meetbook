<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\IsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookController extends Controller
{
	public function store(Request $request){
		return IsAdmin::allowAdminNoView();
		$entry=$request->all();
		if($file=$request->file('image')){
			$name=str_replace(" ","_",$entry['title']) . '.' . $file->getClientOriginalExtension();
			$file->move("books_image",$name);
			$entry['image']=$name;
		};
		if($request['name_saga']==null){
			$entry['saga']=false;
		}else{
			$entry['saga']=true;
		}
		Book::create($entry);
		return redirect('admin/books');
	}

	public function showBook($id){
		$data=DB::table('books')->join('authors','authors.id','=','books.id_author')->select('books.*','authors.name as name_author')->where('books.id',$id)->get();
		return IsAdmin::allowAdmin('show_book')->with('data',$data);
	}

	public function searchAutocompleteAuthors(Request $request){
		$authors = Author::where('name','LIKE','%' . $request->entry . '%')->select('name','id')->get();
		return response(json_encode($authors),200);
	}

	public function editBook(Request $resquest,$id){
		Book::findOrFail($id)->update($resquest->all());
		return redirect('admin/books');
	}
}
