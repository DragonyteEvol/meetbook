<div>
	<div class="container">
		<div style="float: left;" class="my-2">
			<a href="/LARAVEL/meetbook/public/admin/home"><img src="{{asset('web_image/icon.png')}}" width="40px" height="50px"></a>
		</div>	
		<div style="display: inline-block;" class="mx-5 my-2">
			<a href="profile/{{Auth::user()->name}}" style="text-decoration: none;" class="link-dark">
				<img src="{{asset('users_image/'.Auth::user()->image)}}" width="25px" height="25px" style="border-radius: 150px;">
				<b>{{Auth::user()->name}}</b>
</a>
			<form method="POST" action="{{route('logout')}}">
				{{csrf_field()}}
				<input type="submit" value="Cerrar sesión" class="btn btn-outline-danger btn-sm mx-auto">
			</form>
		</div>
		<div style="width: 40%;float: right;" class="m-3">
			@include('components.search_navbar')
		</div>
	</div>
</div>
<br>
