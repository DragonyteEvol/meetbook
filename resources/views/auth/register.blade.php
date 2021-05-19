<div id="registerPage" style="display: none;position: fixed;background-color: rgba(0, 0, 0, 0.4);width: 100%;height: 100%;">
	<div style="background-color:white;width:45%;height:90%;margin-left: auto;margin-right: auto;border-radius: 8px;" class="my-4">
		<button class="btn-close m-2" onclick="closeRegister()" style="float: right;"></button>
		<br><br>
		<div class="container mx-3"><h4><b>Registarse en Meetbook</b></h4></div>
		<div class="card-body mx-3">
			<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-floating mb-3">
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="name" placeholder="name example">
					<label for="floatingInput">Nombre</label>
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

				</div>


	<div class="form-floating mb-3">
					<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="name@example.com">
					<label for="floatingInput">Correo Electronico</label>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

				</div>

	<div class="form-floating mb-3">
					<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password" id="password" placeholder="*******">
					<label for="floatingInput">Contraseña</label>
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

				</div>

	<div class="form-floating mb-3">
					<input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="password-confirm" placeholder="*******">
					<label for="floatingInput">Confirmar Contraseña</label>

		
	</div>
	<div>
		<input type="file" name="image" class="form-control">
	</div>
	<input type="submit" class="btn btn-primary">
				
					

			</form>
		</div>
	</div>
</div>

<!--<div class="container">
	<div class="form-group row">
	<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

	<div class="col-md-6">
	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
	</div>
	</div>
	<div class="form-group row">
	<label class="col-md-4 col-form-label text-md.right">Imagen</label>
	<div class="col-md-6">
	<input type="file" name="image" class="form-control form-control-sm">
	</div>
	</div>
	<div class="form-group row mb-0">
	<div class="col-md-6 offset-md-4">
	<button type="submit" class="btn btn-primary">
	{{ __('Register') }}
	</button>
	</div>
	</div>
	</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	--!>
