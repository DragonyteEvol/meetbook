<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
	public function showNotifications(){
		return view('show_notifications');;
	}
}
