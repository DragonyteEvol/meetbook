<?php

namespace App\Http\Controllers;

use App\Author;
use App\IsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthorController extends Controller
{

	public function homeAuthors(){
		return IsAdmin::allowAdmin('authors')->with('data',Author::all());
	}

	public function insertAuthor(){
		return IsAdmin::allowAdmin('insert_author');
	}

	public function storeAuthor(Request $request){
		$entry=$request->all();
		if($file=$request->file('image')){
			$name=str_replace(" ","_",$entry['name'] . $entry['born'] . "." . $file->getClientOriginalExtension());
			$file->move('authors_image',$name);
			$entry['image']=$name;
		}
		Author::create($entry);
		return redirect('admin/authors');
	}

	public function showAuthor($id){
		return IsAdmin::allowAdmin('show_author')->with('data',Author::findOrFail($id));
	}

	public function editAuthor(Request $request,$id){
		Author::findOrFail($id)->update($request->all());
		return redirect('admin/authors');
	}
}
