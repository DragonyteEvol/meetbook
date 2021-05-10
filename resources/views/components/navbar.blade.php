<div style="border-bottom: solid grey 0.5px;">
	<div class="container">
		<div style="display: inline-block;margin-right: 20px;">
			<a href="/LARAVEL/meetbook/public/admin/home"><img src="{{asset('web_image/icon.png')}}" width="40px"></a>
		</div>	
		<div style="display: inline-block; margin-top: 5px;">
			<a href="profile/" style="text-decoration: none;" class="link-dark">
				<img src="{{asset('users_image/'.Auth::user()->image)}}" width="25px" height="25px" style="border-radius: 150px;">
				<b>{{Auth::user()->name}}</b>
</a>
			<form method="POST" action="{{route('logout')}}">
				{{csrf_field()}}
				<input type="submit" value="Cerrar sesión" class="btn btn-outline-danger btn-sm m-auto">
			</form>
		</div>
		<div style="display: inline-block;">
			@yield('content_nav')
		</div>
	</div>
</div>
<br>
