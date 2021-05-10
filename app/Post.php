<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = "posts";
	protected $fillable = ['description','book_id','user_id','calification','image','target_id','type'];
}
