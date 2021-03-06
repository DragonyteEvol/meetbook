@extends('layouts.master')
@include('components.navbar')
@section('content')
<form class="form" action="{{route('editBook',$data[0]->id)}}" method="POST">
	@method('PUT')
	{{csrf_field()}}
	@foreach($data as $book)
	<div class="card mb-3">
		<img src="{{asset('books_image/' . $book->image)}}" class="card-img-top" height="600px">
		<div class="card-body">
			<label class="form-label">TITULO</label>
			<input type="text" name="title" value="{{$book->title}}" class="form-control">
			<label class="form-label">ID AUTOR</label>
			<input type="number" name="id_author" value="{{$book->id_author}}" class="form-control">
			<div class="form-text">{{$book->name_author}}</div>
			@if($book->saga)
			<label class="form-label">SAGA</label>
			<input type="text" name="name_saga" value="{{$book->name_saga}}" class="form-control">
			@endif
			<label class="form-label">SINOPSIS</label>
			<textarea class="form-control" name="synopsis">{{$book->synopsis}}</textarea>
			<label class="form-label">PAGINAS</label>
			<input type="number" name="sheets" value="{{$book->sheets}}" class="form-control">
			<label class="form-label">FECHA DE PUBLICACIÓN</label>
			<input type="date" name="date" value="{{$book->date}}" class="form-control">
			<label class="form-label">LENGUAJES</label>
			<input type="text" name="languages" value="{{$book->languages}}" class="form-control">
			<label class="form-label">IMAGEN</label>
			<br>
			<div class="d-grid gap-2">
				<input type="submit" class="btn btn-outline-primary form-control" value="Editar Libro">
			</div>
		</div>
	</div>
	@endforeach
</form>
@endsection
