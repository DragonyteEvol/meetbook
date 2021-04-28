<?php

namespace App\Http\Controllers;

use App\Genre;
use App\IsAdmin;
use Illuminate\Http\Request;

class AdminGenreController extends Controller
{
    public function homeGenres(){
	    return IsAdmin::allowAdmin('genres')->with('data',Genre::all());
    }

    public function insetGenre(){
    	return IsAdmin::allowAdmin('insert_genre');
    }

    public function storeGenre(Request $request){
   	Genre::create($request->all()); 
	return redirect('admin/genres/insert');
    }

    public function showGenre($id){
    	return IsAdmin::allowAdmin('show_genre')->with('data',Genre::findOrFail($id));
    }

    public function editGenre(Request $request,$id){
	    Genre::findOrFail($id)->update($request->all());
	    return redirect('admin/genres');
    }

}
