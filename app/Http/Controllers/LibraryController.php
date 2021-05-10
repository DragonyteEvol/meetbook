<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
	public function storeItemLibrary(Request $request){
		$check = DB::table('libraries')->where('user_id','=',Auth::user()->id)->where('book_id','=',$request->book_id)->get();
		//FAVORITOS
		if($request->library==4){
			$check = DB::table('libraries')->where('user_id','=',Auth::user()->id)->where('book_id','=',$request->book_id)->where('library','=',$request->library)->get();
			if(count($check)>0){
				$rowup = Library::findOrFail($check[0]->id);
				$rowup->delete();
				return "DROP";
			}else{
				$rowup= new Library;
				$rowup->book_id=$request->book_id;
				$rowup->user_id = Auth::user()->id;
				$rowup->library = $request->library;
				$rowup->save();
				return "FAVORITE";
			}
		}


		//LIBRERIA NORMAL
		if(count($check)>0 && $request->library<>4){
			if($request->library==$check[0]->library){
				$rowup=Library::findOrFail($check[0]->id);
				$rowup->delete();
				return "DELETE LIBRARY";
			}else{
				$rowup=Library::findOrFail($check[0]->id);
				$rowup->library=$request->library;
				$rowup->save();
				return "OK";
			}
		}else{
			$item = new Library;
			$item->book_id=$request->book_id;
			$item->user_id = Auth::user()->id;
			$item->library = $request->library;
			$item->save();
			return "OK";	
		}
	} 
}
