@extends('layouts.master')
@include('components.navbar')
@section('content')
	<form method="GET" action="{{route('insertBook')}}">
		<input type="submit" value="CREAR LIBRO" class="btn btn-outline-primary">
	</form>
	@foreach($data as $book)
	<div class="card" style="width: 17rem; display: inline-flex;">
		<img src="../books_image/{{$book->image}}" class="card-img-top" style="height: 300px;">
		<div class="card-body">
			<a href="books/show/{{$book->id}}" class="link-dark"><h3 class="card-title">{{$book->title}}</h4></a>
			<h5 class="card-subtitle mb-2 text-muted">{{$book->name_author}}</h5>
			<p class="card-text">{{$book->synopsis}}</p>
		</div>
	</div>
	@endforeach
@endsection
