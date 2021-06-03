<nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<a href="{{route('home')}}" class="navbar-brand p-0 m-0"><img src="{{asset('web_image/gomuno.png')}}" width="40px" height="50px"></a>
		<div style="display: flexbox;" class="nav-item">
			<a href="{{route('showProfile')}}" style="text-decoration: none;" class="link-dark">
				<img src="{{asset('users_image/'.Auth::user()->image)}}" width="25px" height="25px" style="border-radius: 100%;">
				<b>{{Auth::user()->name}}</b>
			</a>
			<form method="POST" action="{{route('logout')}}">
				{{csrf_field()}}
				<button class="btn badge bg-danger"><b>Cerrar sesión</b></button>
			</form>
		</div>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<box-icon name='menu'></box-icon>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a href="{{route('home')}}" class="link-dark nav-link active" style="text-decoration: none;"><button class="btn "><b class="align-middle">Inicio</b></button></a>
				</li>
				<li class="nav-item">
					<a href="#" class="link-dark text-muted nav-link" style="text-decoration: none;"><button class="btn"><b title="No disponible" class="align-middle text-muted">Biblioteca</b></button></a>
				</li>
				<li class="nav-item">
					<a href="#" class="link-dark nav-link" style="text-decoration: none;"><button class="btn"><b class="align-middle ">Foros</b></button></a>
				</li>
				<li class="nav-item dropdown">
					@include('components.notifications')	
				</li>
			</ul>
			<div class="w-25">

				@include('components.search_navbar')
			</div>
			<!--<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
				</form>-->
		</div>
	</div>
</nav>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{session('message')}}</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
