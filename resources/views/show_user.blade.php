@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-4">
			<img src="{{asset('users_image/' . $data->image)}}" width="100%" height="300px" style="border-radius: 100%;">
			<hr>
			<h4><b>{{$data->name}}</b></h4>
			<p><b>Pais: </b>-</p>
			<p><b>Sitio web: </b>-</p>
			<p><b>Genéros Favoritos: </b>-</p>
			<p><b>Descripción: </b>-</p>
			<hr>
			<h4><b>Autores Seguidos</b></h4>
			<p>----</p>
			<hr>
			<h4><b>Amigos</b></h4>
			<p>----</p>
		</div>
		<div class="col-6">
			<h4><b>Publicaciones y reviews</b></h4>
			<hr>
			<p>LoremLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
			<hr>
		</div>
		<div class="col-2">
			<h4><b>Libros Favoritos</b></h4>
			<p>-----------</p>
			<hr>
			<h4><b>Retos</b></h4>
			<p>-----------</p>
			<hr>
			<h4><b>Publicidad</b></h4>
			<p>-----------</p>
			<hr>
		</div>
	</div>
	<hr>
</div>
@endsection
@section('js')
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
