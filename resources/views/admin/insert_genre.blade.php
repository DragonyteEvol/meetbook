@extends('layouts.master')
@include('components.navbar')
@section('content')
<div class="container">
	<h4><p>Crear Genero</p></h4>
	<form class="form" method="POST" action="{{route('storeGenre')}}">
		{{csrf_field()}}
		<label class="form-label">Genero:</label>
		<input type="text" name="genre" class="form-control" autocomplete="off" placeholder="Escriba genero">
		<br>
		<input type="submit" value="Crear" class="form-control btn btn-outline-success">
	</form>
</div>
@endsection
