<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable=['title','id_author','saga','name_saga','synopsis','sheets','date','languages','reads','image'];

}
