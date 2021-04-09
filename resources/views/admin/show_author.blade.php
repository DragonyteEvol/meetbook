@extends('layouts.master')
@include('components.navbar')
@section('content')
<div class="card mb-3">
	<img src="{{asset('authors_image/' . $data->image)}}" height="600px">
	<div class="card-body">
		<form class="form" method="POST" action="{{route('editAuthor',$data->id)}}">
			@method('PUT')
			{{csrf_field()}}
			<label class="form-label">NOMBRE</label>
			<input type="text" name="name" value="{{$data->name}}" class="form-control"> 
			<label class="form-label">NACIONALIDAD</label>
			<input type="text" name="nacionality" value="{{$data->nacionality}}"class="form-control">
			<label class="form-label">FECHA DE NACIMIENTO</label>
			<input type="date" name="born" value="{{$data->born}}"class="form-control">
			<label class="form-label">FECHA DE FALLECIMIENTO</label>
			<input type="date" name="died" value="{{$data->died}}"class="form-control">
			<label class="form-label">DESCRICIÓN</label>
			<textarea class="form-control" name="description">{{$data->description}}</textarea>
			<br>
			<div class="d-grid gap-2">
				<input type="submit" class="btn btn-outline-primary" value="Editar Autor">
			</div>
		</form>
	</div>
</div>
@endsection
