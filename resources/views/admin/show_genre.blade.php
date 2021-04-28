@extends('layouts.master')
@include('components.navbar')
@section('content')
<h4><b>Editar Genero</b></h4>
<form class="form" method="POST" action="{{route('editGenre',$data->id)}}">
	@method("PUT")
	{{csrf_field()}}
	<label class="form-label">Genero</label>
	<input type="text" value="{{$data->genre}}" class="form-control" name="genre">
	<input type="submit" value="Actualizar" class="form-control btn btn-outline-success">
</form>
@endsection
