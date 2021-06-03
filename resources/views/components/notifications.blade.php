<a href="#" class="link-dark nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"><button class="btn"><b class="align-middle ">
@if(count(auth()->user()->unreadNotifications))
	<b class="align-middle">Notificaciones</b><span class="badge bg-secondary">{{count(auth()->user()->unreadNotifications)}}</span>
	@else
	<b class="align-middle">Notificaciones</b>
	@endif
		</b></button></a>


<!-- MENU  -->
<ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: auto;">
	@foreach(auth()->user()->notifications as $notification)
	@if($notification->data['type']=='friend')
	<li style="border-radius: 5px;border: solid #f4f4f4 2px;">
		<div class="dropdown-item">
			<a href="{{route('showUserUser',$notification->data['user_id'])}}"><img class="mx-1" src="{{asset('users_image/'.$notification->data['image'])}}" width="45rem" height="45rem" style="border-radius: 100%"></a>
			<a class="link-dark" style="text-decoration: none;font-size: small;" href="{{route('showUserUser',$notification->data['user_id'])}}"><span ><b>{{$notification->data['name']}}</b></span></a>
			<p style="font-size: small;word-break: break-all;">{{$notification->data['message']}}</p>
			<div style="width: 50%;margin-left: auto;margin-right: auto;">
				<form action="{{route('allowFriend')}}" method="POST" style="display: inline;">
					{{csrf_field()}}
					<button type="submit" class="btn btn-primary btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Aceptar</button>	
				</form>
				<form action="{{route('declineFriend')}}" method="POST" style="display: inline;">
					@method('DELETE')
					{{csrf_field()}}
					<button type="submit" class="btn btn-danger btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Rechazar</button>	
				</form>
			</div>
		</div>
	</li>
	@elseif($notification->data['type']=='comment')
	<li  style="border-radius: 5px;border: solid #f4f4f4 2px;">
		<div class="dropdown-item">
			<a class="link-dark" style="text-decoration: none;font-size: small;" href="{{route('showUserUser',$notification->data['user_id'])}}"><img class="mx-1" src="{{asset('users_image/'.$notification->data['image'])}}" width="45rem" height="45rem" style="border-radius: 100%"></a>
			<a class="link-dark" style="text-decoration: none;font-size: small;" href="{{route('showUserUser',$notification->data['user_id'])}}"><span ><b>{{$notification->data['name']}}</b></span></a>
			<p style="font-size: small;">{{$notification->data['message']}}</p>
			<div style="width: 70%;margin-left: auto;margin-right: auto;" class="align-middle">
				<a href="{{route('showPostUserNotification',$notification->data['post_id'].'#comment'.$notification->data['comment_id'])}}">
					<button class="btn btn-primary badge">Ver publicación</button>
				</a>
			</div>
		</div>
	</li>

	@elseif($notification->data['type']=='like')
	<li class="btn btn-light" style="border-radius: 5px;border: solid #f4f4f4 2px;">
		<div>
			<a class="link-dark" style="text-decoration: none;font-size: small;" href="{{route('showUserUser',$notification->data['user_id'])}}"><img class="mx-1" src="{{asset('users_image/'.$notification->data['image'])}}" width="45rem" height="45rem" style="border-radius: 100%;float: left;"></a>
			<a class="link-dark" style="text-decoration: none;font-size: small;" href="{{route('showUserUser',$notification->data['user_id'])}}"><span ><b>{{$notification->data['name']}}</b></span></a>
			<span style="font-size: small;">{{$notification->data['message']}}</span>
			<div style="width: 70%;margin-left: auto;margin-right: auto;" class="align-middle">
				<a href="{{route('showPostUserNotification',$notification->data['post_id'])}}">
					<button class="btn btn-primary badge">Ver publicación</button>
				</a>
			</div>
		</div>
	</li>

	@endif
	@endforeach
	<li><a href="{{route('showNotificationUser')}}"><button class="btn btn-light form-control">Ver todas</button></a></li>
</ul>

