<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
	protected $table="like_dislikes";
	protected $fillable=['user_id','post_id','like'];
}
