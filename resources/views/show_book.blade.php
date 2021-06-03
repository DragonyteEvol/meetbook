@extends('layouts.master')
@include('components.navbar_user')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/stars.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
@endsection
@section('content')
<div class="container opacy">
	@foreach($data as $book)
	<div class="row">
		<div class="col-4">
			<img src="{{asset('books_image/'.$book->image)}}" width="100%" height="415px" style="border-radius: 5px;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
			<div class="d-grid gap-2 mt-2">
				@include('components.libraries_button')	
				<button class="btn btn-primary" style="border-radius:15px ;"  type="button"><b>Comprar</b></button>
			</div>
			<hr>
			@include('components.saga_book')	
			@include('components.calification_card_book')
		</div>
		<div class="col-8">
			<h3><b>{{$book->title}}</b></h3>
			@foreach($califications as $calification)
			<span  class="btn btn-sm btn-danger rounded-pill"><b>Calificación: </b>{{round($calification->score/$calification->reviews,2)}}★</span>
			@endforeach
			<span style="display: block;">{{$book->saga ? ($book->name_saga): "-"}}</span>
			<p><b>Autor: </b>{{$book->name}}</p>
			<p><b>Sinopsis: </b>{{$book->synopsis}}</p>
			<hr>
			<h5><b>Información Del Libro</b></h5>
			<p><b>Fecha de publicación: </b>{{$book->date}}</p>
			<p><b>Número de páginas: </b>{{$book->sheets}}</p>
			<p><b>Lenguajes: </b>{{$book->languages}}</p>
			<p><b>Saga: </b>{{$book->saga ? $book->name_saga : "No aplica"}}</p>
			<p><b>{{count($genres)>0 ? "Géneros" : "-"}}</b></p>
			<p>
			@foreach($genres as $genre)
			<span class="btn btn-sm btn-light rounded-pill">
				<a href="{{route('searchGenresUser',$genre->genre)}}" class="btn btn-sm btn-light rounded-pill">{{$genre->genre}}</a>
			</span>
			@endforeach
			</p>
			<hr>
			<h5><b>Reseñas</b></h5>
			<hr>
			<div class="row">
				<div class="col-2">
					<img src="{{asset('users_image/'.Auth::user()->image)}}" width="80%" height="75rem" style="border-radius: 100%;">
				</div>
				<div class="col-10">
					<form action="{{route('storeReviewUser')}}" method="POST">
						@foreach($data as $book)
						<input type="number" style="display: none;" value="{{$book->id}}" name="book_id">	
						@endforeach
						{{csrf_field()}}
						<div class="form-floating" style="margin-bottom: 5px;">
							<textarea required class="form-control" placeholder="Escribe tu reseña aqui" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
							<label for="floatingTextarea2">Reseña este libro</label>
						</div>
						<p class="clasificacion fs-4" style="display: inline-block;">
						<input id="radio1" type="radio" name="calification" value="5" required><!--
						--><label for="radio1">★</label><!--
						--><input id="radio2" type="radio" name="calification" value="4" required><!--
						--><label for="radio2">★</label><!--
						--><input id="radio3" type="radio" name="calification" value="3" required><!--
						--><label for="radio3">★</label><!--
						--><input id="radio4" type="radio" name="calification" value="2"required><!--
						--><label for="radio4">★</label><!--
						--><input id="radio5" type="radio" name="calification" value="1"required><!--
						--><label for="radio5">★</label>
						</p>
						<button class="btn btn-primary" style="float: right;"><b>Publicar</b></button>
					</form>
				</div>

			</div>
			<hr>
			<div class="row p-2"style="border-radius: 15px;border: solid #f2f2f2 2px;font-size: small">
				@foreach($reviews as $review)
				<div class="col-2">
					<img src="{{asset('users_image/'.$review->image)}}" width="70%" height="65rem" style="border-radius: 100%;" title="{{$review->name}}">
					<p>{{$review->created_at}}</p>
				</div>
				<div class="col-9">
					<p>{{$review->description}}</p>
				</div>
				<div class="col-1">
					<p>{{$review->calification}}★</p>
				</div>
				@include('components.like_dislike_comment')
				@include('components.comments')
				<hr>
				@endforeach
				<div class="col-12">
					{{$reviews->links()}}
				</div>	
			</div>
		</div>
	</div>
</div>
@endforeach
</div>
<hr>
@endsection
@section('js')
@routes
<script src="{{asset('js/search_nav.js')}}"></script>
<script src="{{asset('js/show_comments.js')}}"></script>
<script src="{{asset('js/libraries.js')}}"></script>
@endsection
