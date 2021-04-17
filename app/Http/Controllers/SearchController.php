<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
	public function searchBookProfileAutocomplete(Request $request){
		$a = DB::table('books')->where('title','LIKE','%'.$request->text.'%')->select('title as name','image')->take(5)->get();
		$a->map(function($a){
		$a->type = 1;
		});
		$b = DB::table('authors')->where('name','LIKE','%'.$request->text.'%')->select('name','image')->take(5)->get();
		$b->map(function($b){
		$b->type = 2;
		});
		$c = DB::table('users')->where('name','LIKE','%'.$request->text.'%')->select('name','image')->take(5)->get();
		$c->map(function($c){
		$c->type = 3;
		});
		return response(json_encode($a->merge($b)->merge($c)));
		}
}

