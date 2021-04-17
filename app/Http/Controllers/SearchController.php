<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
	public function searchBookProfileAutocomplete(Request $request){
		$a = DB::table('books')->where('title','LIKE','%'.$request->text.'%')->select('title as name')->get();
		$b = DB::table('authors')->where('name','LIKE','%'.$request->text.'%')->select('name')->get();
		$c = DB::table('users')->where('name','LIKE','%'.$request->text.'%')->select('name')->get();
		return response(json_encode($a->merge($b)->merge($c)));
		}
}

