@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="conatainer">
	<div class="row">
		<div class="col-4">
			<img src="{{asset('authors_image/' . $data->image)}}" width="100%" height="440px">
			<div class="d-grid gap-2">
				<button class="btn btn-primary form-control" type="button">Seguir</button>
			</div>
		</div>
		<div class="col-4">
			<h3><b>{{$data->name}}</b></h3>
			<p><b>Descripción: </b>{{$data->description}}</p>
			<hr>
			<p>INFO EXTRA : Generos twiter, pagina web, youtube etc</p>
		</div>
		<div class="col-4">
			<h5><b>Información Adicional</b></h5>
			<p><b>Nacionalidad: </b>{{$data->nacionality}}</p>
			<p><b>Fecha de nacimiento: </b>{{$data->born}}</p>
			<p><b>Fecha de muerte: </b>{{$data->died ? $data->died : "-"}}</p>
		<hr>
		<div class="row">
			<h5><b>Libros Publicados</b></h5>
			@foreach($books as $book)
			<div class="col-4">
				<img src="{{asset('books_image/' . $book->image)}}" width="100%" height="150px" style="margin-bottom: 5px;">
			</div>
			@endforeach
		</div>
		</div>
	</div>
	<hr>
	<p>Publicaciones y actualizaciones</p>
</div>
@endsection
@section('js')
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
