<?php

namespace App\Http\Controllers;

use App\Review;
use App\UserReviewCount;
use App\Calification;
use App\PostMuch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
	public function storeReview(Request $request){
		$count_review=UserReviewCount::where('user_id','=',Auth::user()->id)->where('book_id','=',$request->book_id)->get();
		$calification_count = Calification::where('book_id','=',$request->book_id)->get();
		if(count($count_review)==0){
			$count = new UserReviewCount;
			$count->user_id = Auth::user()->id;
			$count->book_id = $request->book_id;
			$count->count = 1;
			$count->save();
			$new= ['description'=>$request->description,'book_id'=>$request->book_id,'user_id'=>Auth::user()->id,'calification'=>$request->calification,'target_id'=>Auth::user()->id,'type'=>1];
			Review::create($new);
			if(count($calification_count)==0){
				$calification = new Calification;
				$calification->book_id = $request->book_id;
				$calification->score = $request->calification;
				$calification->reviews = 1;
				if($request->calification=='5'){
					$calification->five_star = 1;
				}else if($request->calification=='4'){
					$calification->four_star = 1;
				}else if($request->calification=='3'){
					$calification->three_star = 1;
				}else if($request->calification=='2'){
					$calification->two_star= 1;
				}else if($request->calification=='1'){
					$calification->one_star= 1;
				}
				$calification->save();
			}else{
				$calification = Calification::findOrFail($calification_count[0]->id);
				$calification->score = $calification->score + $request->calification;
				$calification->reviews = $calification->reviews + 1;
				if($request->calification=='5'){
					$calification->five_star = $calification->five_star + 1;
				}else if($request->calification=='4'){
					$calification->four_star = $calification->four_star + 1;
				}else if($request->calification=='3'){
					$calification->three_star = $calification->three_star + 1;
				}else if($request->calification=='2'){
					$calification->two_star= $calification->two_star + 1;
				}else if($request->calification=='1'){
					$calification->one_star= $calification->one_star + 1;
				}
				$calification->save();
			}
			return redirect()->back();
		}else if($count_review[0]->count<=2){
			$new= ['description'=>$request->description,'book_id'=>$request->book_id,'user_id'=>Auth::user()->id,'calification'=>$request->calification,'target_id'=>Auth::user()->id,'type'=>1];
			Review::create($new);
			$add=UserReviewCount::findOrFail($count_review[0]->id);
			$add->count = $add->count + 1;
			$add->save();
			if(count($calification_count)==0){
				$calification = new Calification;
				$calification->book_id = $request->book_id;
				$calification->score = $request->calification;
				$calification->reviews = 1;
				if($request->calification=='5'){
					$calification->five_star = 1;
				}else if($request->calification=='4'){
					$calification->four_star = 1;
				}else if($request->calification=='3'){
					$calification->three_star = 1;
				}else if($request->calification=='2'){
					$calification->two_star= 1;
				}else if($request->calification=='1'){
					$calification->one_star= 1;
				}
				$calification->save();
			}else{
				$calification = Calification::findOrFail($calification_count[0]->id);
				$calification->score = $calification->score + $request->calification;
				$calification->reviews = $calification->reviews + 1;
				if($request->calification=='5'){
					$calification->five_star = $calification->five_star + 1;
				}else if($request->calification=='4'){
					$calification->four_star = $calification->four_star + 1;
				}else if($request->calification=='3'){
					$calification->three_star = $calification->three_star + 1;
				}else if($request->calification=='2'){
					$calification->two_star= $calification->two_star + 1;
				}else if($request->calification=='1'){
					$calification->one_star= $calification->one_star + 1;
				}
				$calification->save();
			}
			return redirect()->back();
		}else {
			return redirect()->back();
		}
	}
}
