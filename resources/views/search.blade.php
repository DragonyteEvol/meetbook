@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="container">
<div style="width: 50%;" class="">
<h4><b>Filtrar Busqueda</h4>
<form class="form" method="GET" action="{{route('searchWithFilters')}}">
<div class="input-group">
		<select name="genre" class="form-select" id="genres">
			<option selected>Selecciona un genero</option>
		</select>
		@if(isset($search_text))
		<input type="text" name="text" placeholder="Busqueda" value="{{$search_text}}" class="form-control">
		@else
		<input type="text" name="text" placeholder="Busqueda" class="form-control">
		@endif
		<button type="submit" class="btn btn-primary "><b>Filtrar</b></button>
	</div>
</form>	
<br>

</div>
		<div class="row">
		<!--BOOKS--!>
		@foreach($books as $book)
		<div class="col-lg-3 col-md-4 col-sm-6 my-2">
			<div class="card" style="width:100%;">
			<a href="{{route('showBookUser',$book->id)}}"><img src="{{asset('books_image/'.$book->image)}}" class="card-img-top" width="90%" height="350px"></a>	
				<div class="card-body">
					<a style="text-decoration:none" class="link-dark" href="{{route('showBookUser',$book->id)}}"><h5><b>{{$book->title}}</b></h5></a>	
					<span class="text-muted" style="font-size: small;">{{$book->name}}</span>
					<img style="float: right;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWUlEQVRIiWNgGI5gAgMDw3sGBob/ZOD7DAwMDoQMJ8dgdEtwggdQRQZE+xcVwCwhX8GoBaMWjFowagHlBd3gsYDc0pQgeEBrC6hR4RBMJBMYGBg+0NKCoQUAPkCa2ylim6wAAAAASUVORK5CYII="/>
				</div>
			</div>
		</div>
		@endforeach
		<!--AUTHORS--!>
		@if(isset($authors))
		@foreach($authors as $author)
		<div class="col-lg-3 col-md-4 col-sm-6 my-2">
			<div class="card" style="width:100%;">
			<a href="{{route('showAuthorUser',$author->id)}}"><img src="{{asset('authors_image/'.$author->image)}}" class="card-img-top" width="90%" height="350px"></a>
				<div class="card-body">
					<a class="link-dark" style="text-decoration: none;" href="{{route('showAuthorUser',$author->id)}}"><h5><b>{{$author->name}}</b></h5></a>
					<span class="text-muted" style="font-size: small;">{{$author->nacionality}}</span>
					<img style="float: right;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA8ElEQVRIieWVURGDMAyGPwmVUClIwcGQgIMhYQ7ACUjAwXCwPZAeuVLWsHUPu+UuL2n6/SFpC/y7OeAi7r4BH4GH+FhSRMMn8WIiceVeYkVEYrgGapHGAgvJKZ+kcl21V+JZgSoDDy3QVafWD+0myV0uUSo/BQdY2Ab4yuLTZILXakPOQnvMcICB/aBaibVRbmiNGe4Sm3TscSBgtkY2DAquz337qUDoaY1tgKcEvCQvBrgHrmcFOrb2pODhaY6fCstpA2BObHSs7eqjtYX1MlZWOOyvfA/co9gggm9Z6l0JX9JQ6GcSRGbWmfgS0N+2J37eiCrHS9NDAAAAAElFTkSuQmCC"/>
				</div>
			</div>
		</div>
		@endforeach
		@endif
		<!--USERS--!>
		@if(isset($users))
		@foreach($users as $user)
		<div class="col-lg-3 col-md-4 col-sm-6 my-2">
			<div class="card" style="width:100%;">
			<a href="{{route('showUserUser',$user->id)}}"><img src="{{asset('users_image/'.$user->image)}}" class="card-img-top" width="90%" height="350px"></a>
				<div class="card-body">
					<a class="link-dark" style="text-decoration: none;" href="{{route('showUserUser',$user->id)}}"><h5><b>{{$user->name}}</b></h5></a>
					<span class="text-muted" style="font-size: small;">{{$user->country}}</span>
					<img style="float:right" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAyUlEQVRIie2U0Q2DMAxE3wgZgVE8AiN0hG4Ao3QENiAb0E0YgX40UUwKJCJBqtSe5B+c3Fm+C/AraIERWFyNgNQifyjiuPpS8laR3YHGVa++S4mAVeQxvIgtEfBTmo1eo/rfK2DZN7N3vaFEQJvcEUzuqGQyrBNTPaYeQliXT47UIr8MhveuJ/ZXNLkzWyk7xA2YD4jjmt2dbHJ/ceB418LamzZFbtTk2RMRkjaTWJc/eObxWDKi++T84xGC8bso/bck718u8McHXtu5ZB7gUMqEAAAAAElFTkSuQmCC"/>
				</div>
			</div>
		</div>

		@endforeach
		@endif

	</div>
</div>
@endsection
@section('js')
@routes
<script src="{{asset('js/get_genres.js')}}"></script>
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
