<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostMuch;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function storePost($id,Request $request){
		$new=['user_id'=>Auth::user()->id,'target_id'=>$id,'description'=>nl2br($request->description),'type'=>2];
		Post::create($new);
		return redirect()->back();
	}
}
