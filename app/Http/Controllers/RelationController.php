<?php

namespace App\Http\Controllers;

use App\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelationController extends Controller
{
	public function followUser(Request $request){
		$check= DB::table('relations')->where('user_id','=',Auth::user()->id)->where('target_id','=',$request->user)->get();
		if(count($check)==0){
			$data = ['user_id'=>Auth::user()->id,'target_id'=>$request->user,'follow'=>true];
			Relation::create($data);
			return back();
		}else{
			$row_delete=Relation::findOrFail($check[0]->id);
			$row_delete->delete();
			return back();
		}
	}
}
