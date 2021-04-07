<?php

namespace App\Http\Controllers;

use App\IsAdmin;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
	public function deleteUser($id){
		$user=User::findOrFail($id);
		$user->delete();
		return redirect('/admin/users');

	}
}
