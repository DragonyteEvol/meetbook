<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostDataExtra extends Model
{
	protected $table="post_data_extra";
	protected $fillable=['post_id','like','dislike','comment'];
}
