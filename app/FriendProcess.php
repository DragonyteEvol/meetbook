<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendProcess extends Model
{
	protected $table= "friends_process";
	protected $fillable=['sender_id','target_id'];
}
