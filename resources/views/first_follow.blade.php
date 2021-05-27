<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Meetbook - Plataforma social de libros</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<style>
body{
	margin: 0;
	padding: 0;
	font-family: 'Montserrat', sans-serif;
}
		</style>

	</head>
	<body style="overflow-x:hidden">
		<div class="row">
			<div class="col-lg-5 col-md-4 col-sm-12"><img src="{{asset('web_image/akuma-wall.jpg')}}" width="100%" height="600rem"></div>	
			<div class="col-lg-7 col-md-8 col-sm-12">
				<br><br>
				<h1 class="display-1"><b>Un ultimo paso</b></h1>
				<h3><b>Sigue a alguien</b></h3>
				<br>
				<div class="row">
					@foreach($users as $user)
					<div class="col-2">
						<img src="{{asset('users_image/'.$user->image)}}" width=100% height=55px>
						<small><b>{{$user->name}}</b></small>
						<form class="form" method="POST" action="{{route('followUser')}}">
							{{csrf_field()}}
							<input type="number" name="user" value="{{$user->id}}" style="display: none;">
							<button class="btn btn-primary badge bg-primary"  type="submit"><b>Seguir</b></button>
						</form>
					</div>	
					@endforeach
				</div>
				<form method="POST" action="{{route('already')}}">
					@method('PUT')
					{{csrf_field()}}
					<button type="submit" class="btn btn-primary m-5 float-end "><b>Finalizar</b></button>
				</form>
			</div>
		</div>
	</body>
</html>
