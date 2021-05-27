<?php 

namespace App\Http\Controllers;

use App\Friend;
use App\FriendProcess;
use App\Notification;
use App\Notifications\FriendNotification;
use App\Relation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

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

	public function addFriend($id){
		if(count(FriendProcess::where('sender_id','=',Auth::user()->id)->where('target_id','=',$id)->get())>0){
			$data=(FriendProcess::where('sender_id','=',Auth::user()->id)->where('target_id','=',$id)->get());
		}else if(count(FriendProcess::where('target_id','=',Auth::user()->id)->where('sender_id','=',$id)->get())>0){
			$data=(FriendProcess::where('target_id','=',Auth::user()->id)->where('sender_id','=',$id)->get());
		}else{
			$data=[];
		}

		if(count(Relation::where('user_id','=',Auth::user()->id)->where('target_id','=',$id)->where('friend','=',true)->get())>0){
			$friend=Relation::where('user_id','=',Auth::user()->id)->where('target_id','=',$id)->where('friend','=',true)->get();
		}else if(count(Relation::where('target_id','=',Auth::user()->id)->where('user_id','=',$id)->where('friend','=',true)->get())>0){
			$friend=Relation::where('target_id','=',Auth::user()->id)->where('user_id','=',$id)->where('friend','=',true)->get();
		}else{
			$friend=[];
		}



		if(count($data)>0){
			FriendProcess::findOrFail($data[0]->id)->delete();
			$delete_id=DB::table('notifications')->where('notifiable_id','=',$id)->where('data','LIKE','%'.',"user_id":'.Auth::user()->id.',%')->get();
			$delete_notification=Notification::findOrFail($delete_id[0]->id);
			$delete_notification->delete();
			return back();
		}else{
			if(count($friend)>0){
				Relation::findOrFail($friend[0]->id)->delete();
				$row_a=Friend::where('user_a',Auth::user()->id)->where('user_b',$id)->get();
				$row_b=Friend::where('user_a',$id)->where('user_b',Auth::user()->id)->get();
				Friend::findOrFail($row_a[0]->id)->delete();
				Friend::findOrFail($row_b[0]->id)->delete();
				return back();

			}else{
				$friend_process=FriendProcess::create(['sender_id'=>Auth::user()->id,'target_id'=>$id]);
				$user=User::findOrFail($id);
				$user->notify(new FriendNotification($friend_process));;
				return back();
			}
		}

	}


	public function allowFriend(Request $request){
		$friend=FriendProcess::where('target_id','=',Auth::user()->id)->where('sender_id','=',$request->friend)->get();
		if(count($friend)>0){
			FriendProcess::findOrFail($friend[0]->id)->delete();
			Relation::create(['user_id'=>$request->friend,'target_id'=>Auth::user()->id,'friend'=>true]);
			$find=DB::table('notifications')->where('notifiable_id',Auth::user()->id)->where('data','LIKE','%"user_id":'.$request->friend.'%')->get();
			$notification=Notification::findOrFail($find[0]->id);
			$notification->delete();
			Friend::create(['user_a'=>Auth::user()->id,'user_b'=>$request->friend]);
			Friend::create(['user_a'=>$request->friend,'user_b'=>Auth::user()->id]);
			return back()->with('message','Solicitud aceptada');
		}else{
			return back()->with('message','A HACKIAR A SU MADRE BCRRA');
		}
	}

	public function declineFriend(Request $request){
		$decline=FriendProcess::where('target_id','=',Auth::user()->id)->where('sender_id','=',$request->friend)->get();
		if(count($decline)>0){
			FriendProcess::findOrFail($decline[0]->id)->delete();
			auth()->user()->unreadNotifications->markAsRead();
			$find=DB::table('notifications')->where('notifiable_id',Auth::user()->id)->where('data','LIKE','%"user_id":'.$request->friend.'%')->get();
			$notification=Notification::findOrFail($find[0]->id);
			$notification->delete();
			return back()->with('message','Solicitud rechazada');
		}else{
			return back()->with('message','A HACKIAR A SU MADRE BCRRA');
		}
	}

	public function showRelationFriend($id){
		$data= DB::table('friends')->join('users','users.id','=','friends.user_b')->where('friends.user_a','=',$id)->select('users.image','users.name','users.id','friends.created_at','users.country')->paginate(50);
		return view('show_relations')->with('data',$data);
	}

	public function showRelationFollower($id){
		$data= DB::table('relations')->join('users','users.id','=','relations.user_id')->where('target_id','=',$id)->where('follow',true)->select('users.id','users.image','users.name','users.country')->paginate(50);
		return view('show_relations')->with('data',$data);
	}

	public function showRelationFollow($id){
		$data= DB::table('relations')->join('users','users.id','=','relations.target_id')->where('user_id','=',$id)->where('follow',true)->select('users.id','users.image','users.name','users.country')->paginate(8);
		return view('show_relations')->with('data',$data);
	}
}
