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
		<div class="row">
			<div class="col-lg-5 col-md-4 col-sm-12"><img src="{{asset('web_image/akuma-wall.jpg')}}" width="100%" height="600rem"></div>	
			<div class="col-lg-7 col-md-8 col-sm-12">
				<br><br>
				<h1 class="display-1"><b>Cuentanos un poco mas de ti</b></h1>
				<br>
				<div class="row">
					<div class="col-8">
						<form class="form" method="POST" action="{{route('editFirstData')}}">
							@method('PUT')
							{{csrf_field()}}
							<div class="form-floating">
								<select class="form-select" id="floatingSelect" name="country" aria-label="Floating label select example">
									<option selected class="text-muted">Selecciona un país</option>
									@foreach($countries as $country)
									<option value="{{$country->country}}">{{$country->country}}</option>
									@endforeach
								</select>
								<label for="floatingSelect">País</label>
							</div>
							<div class="form-floating my-3">
								<input type="text" name="website" class="form-control" id="floatingInput" placeholder="https://www.example.com">
								<label for="floatingInput" class="text-muted">Website<small> (opcional)</small></label>
							</div>
							<div class="form-floating">
								<textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
								<label for="floatingTextarea2" class="text-muted">Descripción<small> (opcional)</small></label>
							</div>
							<button class="btn btn-primary my-3"><b>Guardar</b></button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</body>
</html>
