@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="container">
	@foreach($data as $book)
	<div class="row">
		<div class="col-4">
			<img src="{{asset('books_image/'.$book->image)}}" width="300px" height="415px">
		</div>
		<div class="col-8">
			<h3><b>{{$book->title}}</b></h3>
			<span>{{$book->saga ? ($book->name_saga): "-"}}</span>
			<p><b>Autor: </b>{{$book->name}}</p>
			<p><b>Sinopsis: </b>{{$book->synopsis}}</p>
			<hr>
			<h5><b>Información Del Libro</b></h5>
			<p><b>Fecha de publicación: </b>{{$book->date}}</p>
			<p><b>Número de páginas: </b>{{$book->sheets}}</p>
			<p><b>Lenguajes: </b>{{$book->languages}}</p>
			<p><b>Saga: </b>{{$book->saga ? $book->name_saga : "No aplica"}}</p>
		</div>
	</div>
	@endforeach
</div>
<hr>
<!-- REVIEWS --!>
<div class="conatainer">
</div>
@endsection
@section('js')
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
