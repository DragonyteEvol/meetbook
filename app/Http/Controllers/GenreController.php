<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
	function getGenres(){
		$genres=Genre::all();
		return response(json_encode($genres));
	}
}
