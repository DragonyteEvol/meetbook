@extends('layouts.master')
@include('components.navbar')
@section('content')
<h2>AUTORES</h2>
<form method="GET" action="{{route('insertAuthor')}}">
	<input type="submit" class="btn btn-outline-success"  value="Crear Autor">
</form>
@foreach($data as $author)
<div class="card" style="width: 17rem;display: inline-flex;">
	<div class="card-body">
		<h3 class="card-title">{{$author->name}}</h3>
		<h5 class="card-subtitle">{{$author->nacionality}}</h5>
		<p class="card-text">{{$author->description}}</p>
	</div>
</div>
@endforeach
@endsection
