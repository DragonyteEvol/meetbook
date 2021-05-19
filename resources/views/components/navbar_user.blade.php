<div>
	<div class="container">
		<div style="float: left;" class="my-2 mx-2">
			<a href="/LARAVEL/meetbook/public/admin/home"><img src="{{asset('web_image/icon.png')}}" width="40px" height="50px"></a>
		</div>	
		<div style="display: inline-block;" class="my-2">
			<a href="{{route('showProfile')}}" style="text-decoration: none;" class="link-dark">
				<img src="{{asset('users_image/'.Auth::user()->image)}}" width="25px" height="25px" style="border-radius: 150px;">
				<b>{{Auth::user()->name}}</b>
			</a>
			<form method="POST" action="{{route('logout')}}">
				{{csrf_field()}}
				<input type="submit" value="Cerrar sesión" class="btn btn-outline-danger btn-sm mx-auto" style="border-radius: 10px;font-weight: bold;">
			</form>
		</div>
		<div class="dropdown" style="display: inline;">
			<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
				@if(count(auth()->user()->unreadNotifications))
				<b class="align-middle">Notificaciones</b><span class="badge bg-secondary">{{count(auth()->user()->unreadNotifications)}}</span>
				@else
				<b>Notificaciones</b>
				@endif
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				@foreach(auth()->user()->notifications as $notification)
				<li class="btn btn-light" style="border-radius: 5px;border: solid #f4f4f4 5px;">
					<div>
						<a href="{{route('showUserUser',$notification->data['user_id'])}}"><img class="mx-1" src="{{asset('users_image/'.$notification->data['image'])}}" width="45rem" height="45rem" style="border-radius: 100%;float: left;"></a>
						<a class="link-dark" style="text-decoration: none;font-size: small;" href="{{route('showUserUser',$notification->data['user_id'])}}"><span ><b>{{$notification->data['name']}}</b></span></a>
						<span style="display: block;font-size: small;">{{$notification->data['message']}}</span>
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
				@endforeach
				<li><button class="btn btn-light form-control">Ver todas</button></li>
			</ul>
		</div>
		

		<div style="width: 40%;float: right;" class="m-3">
			@include('components.search_navbar')
		</div>

		@if(session()->has('message'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{session('message')}}</strong> 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif

	</div>
</div>
<br>
