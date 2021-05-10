<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
	protected $table="libraries";
	protected $fillable=['boook_id','user_id','library'];
}
