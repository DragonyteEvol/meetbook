@extends('layouts.master')
@include('components.navbar')
@section('content')
<h4>Crear Autor</h4>
<form class="form" method="POST" action="{{route('storeAuthor')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<label class="form-label">Nombre</label>
	<input type="text" name="name" class="form-control">
	<label class="form-label">Nacionalidad</label>
	<input type="text" name="nacionality"class="form-control">
	<label class="form-label">Nacimiento</label>
	<input type="date" name="born"class="form-control">
	<label class="form-label">Muerte</label>
	<input type="date" name="died"class="form-control">
	<label class="form-label">Descripcion o biografia</label>
	<textarea class="form-control" name="description"></textarea>
	<label class="form-label">Imagen</label>
	<input type="file" name="image"class="form-control"><br>
	<input type="submit" class="btn btn-outline-primary" value="Crear Autor">
</form>
@endsection
