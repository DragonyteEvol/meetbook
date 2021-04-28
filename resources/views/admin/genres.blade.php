@extends('layouts.master')
@include('components.navbar')
@section('content')
<div class="row">
	<div class="col-10">
		<form method="GET">
			{{csrf_field()}}
			<input type="text" id="search" name="search" class="form-control" placeholder="Buscar Generos" autocomplete="off">
		</form>
	</div>
	<div class="col-2">
		<a href="{{route('insertGenre')}}"><button class="btn btn-outline-success">Crear Genero</button></a>
	</div>
	<div class="container">
		<div class="row" id="body_search">
			@foreach($data as $genre)
			<div class="col-3">
				<a href="{{route('showGenre',$genre->id)}}"><div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
					<div class="card-header">{{$genre->genre}}</div>
				</div></a>
			</div>
			@endforeach
		</div>
	</div>
	@endsection
	@section('js')
	<script>
		$('document').ready(function(){
					$('#search').keyup(function(){
								$.ajax({
											url : "{{route('searchGenres')}}",
											method : "GET",
											data : {
														_token : $('input[name="_token"]').val(),
														text : $('#search').val()
													}
										}).done(function(dataJson){
													var data= JSON.parse(dataJson);
													print = ""
													for(var i =0;i<data.length;i++){
																print+= '<div class="col-3"><a href="genres/show/'+data[i].id+'"><div class="card text-white bg-primary mb-3" style="max-width: 18rem;"><div class="card-header">'+data[i].genre+'</div></div></div>';
															}
													document.getElementById('body_search').innerHTML = print;
												})
							})
				})
	</script>
	@endsection
