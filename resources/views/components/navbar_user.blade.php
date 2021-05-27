<div>
	<div class="container" style="display: inline;">
		<div style="float: left;" class="my-2 mx-2">
			<a href="{{route('home')}}"><img src="{{asset('web_image/gomuno.png')}}" width="40px" height="50px"></a>
		</div>	
		<div style="display: inline-block;width: auto;" class="my-1">
			<a href="{{route('showProfile')}}" style="text-decoration: none;" class="link-dark">
				<img src="{{asset('users_image/'.Auth::user()->image)}}" width="25px" height="25px" style="border-radius: 150px;">
				<b>{{Auth::user()->name}}</b>
			</a>
			<form method="POST" action="{{route('logout')}}">
				{{csrf_field()}}
				<button class="btn badge bg-danger"><b>Cerrar sesión</b></button>
			</form>
		</div>
		<span class="mx-5">
		<a href="{{route('home')}}" class="link-dark" style="text-decoration: none;"><button class="btn "><b class="align-middle">Inicio</b></button></a>
		<a href="#" class="link-dark text-muted" style="text-decoration: none;"><button class="btn"><b title="No disponible" class="align-middle text-muted">Biblioteca</b></button></a>
		<a href="#" class="link-dark " style="text-decoration: none;"><button class="btn"><b class="align-middle ">Foros</b></button></a>
		@include('components.notifications')	
		</span>

		<div style="float: right;width: 30%;" class="m-2">
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
