<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
	protected $fillable = ['user_id','target_id','status','follow','friend'];
}
