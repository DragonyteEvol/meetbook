<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Meetbook - Plataforma social de libros</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
		<style>
body{
	margin: 0;
	padding: 0;
	font-family: 'Montserrat', sans-serif;
}
		</style>

	</head>
	<body style="overflow-x:hidden">
	<!-- LOGIN PAGE  --!>
		@include('auth.register')
		<div id="loginPage" style="display: none;position: fixed;background-color: rgba(0, 0, 0, 0.4);width: 100%;height: 100%;">
			<div style="background-color:white;width:45%;height:60%;margin-left: auto;margin-right: auto;border-radius: 8px;" class="my-4">
				<button class="btn-close m-2" onclick="closeLogin()" style="float: right;"></button>
				<br><br>
				<div class="container mx-3"><h4><b>Iniciar sessión</b></h4></div>

				<div class="card-body mx-3">
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="form-floating mb-3">
							<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" placeholder="name@example.com">
							<label for="floatingInput">Correo Electronico</label>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror

						</div>

						<div class="form-floating mb-3">
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password" id="password" placeholder="*****">
							<label for="floatingInput" class="text-muted">Contraseña</label>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror

						</div>
						<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

						<label class="form-check-label" for="remember">
							{{ __('Recordar credenciales') }}
						</label>
						<div>
							<button type="submit" class="btn btn-primary">
								{{ __('Iniciar') }}
							</button>

							@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Olvidaste tu contraseña?') }}
							</a>
							@endif


						</div>




					</form>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-5 col-md-4 col-sm-12"><img src="{{asset('web_image/akuma-wall.jpg')}}" width="100%" height="600rem"></div>	
			<div class="col-lg-7 col-md-8 col-sm-12">
				<br><br>
				<h1 class="display-1"><b>Meetbook comparte tus historias</b></h1>
				<h3><b>Inicia o regístrate en Meetbook.</b></h3>
				<br>
				@if (Route::has('login'))
				<div class="top-right links">
					@auth
					<a href="{{ url('/home') }}">Home</a>
					@else
					<a onclick="login()" class="btn btn-lg  btn-primary" >Iniciar sesión</a>

					@if (Route::has('register'))
					<a onclick="register()" class="btn btn-lg btn-primary">Regístrate</a>
					@endif
					@endauth
				</div>
				@endif  

			</div>
		</div>
		<script
				src="https://code.jquery.com/jquery-3.6.0.min.js"
				integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
				crossorigin="anonymous"></script>
		<script>
			function login(){
							document.getElementById('loginPage').style.display="";			
						}

			function closeLogin(){
							document.getElementById('loginPage').style.display="none";			
						}

			function register(){
							document.getElementById('registerPage').style.display="";			
						}

			function closeRegister(){

							document.getElementById('registerPage').style.display="none";			
						}
		</script>
	</body>
</html>
