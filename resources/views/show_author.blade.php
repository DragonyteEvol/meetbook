@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="conatainer">
	<div class="row">
		<div class="col-4">
			<img src="{{asset('authors_image/' . $data->image)}}" width="100%" height="500px" style="border-radius: 15px;">
		</div>
		<div class="col-4">
			<h3><b>{{$data->name}}</b></h3>
			<p><b>Descripción: </b>{{$data->description}}</p>
			<hr>
			<p><b>Twitter: </b><a href="{{$data->twitter}}">{{$data->twitter}}</a></p>
			<p><b>Sitio web: </b><a href="{{$data->website}}">{{$data->website}}</a></p>
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
					<a href="{{route('showBookUser',$book->id)}}" title="{{$book->title}}"><img src="{{asset('books_image/' . $book->image)}}" width="100%" height="150px" style="margin-bottom: 5px;border-radius: 5px;"></a>		
				</div>
				@endforeach
				<a href="{{route('showLibraryAuthor',$data->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
			</div>
		</div>
	</div>
	<hr>
</div>
@endsection
@section('js')
@routes
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
