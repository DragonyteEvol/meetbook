@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-4">
			<img src="{{asset('users_image/' . $data->image)}}" width="100%" height="300px" style="border-radius: 100%;">
			<h4 style="text-align: center;"><b>{{$data->name}}</b></h4>
			@if(count($follow_check)==0)
			<form class="form" method="POST" action="{{route('followUser')}}">
			{{csrf_field()}}
			<input type="number" name="user" value="{{$data->id}}" style="display: none;">
			<button class="btn btn-primary form-control" type="submit" style="border-radius:10px ;"><b>Seguir</b></button>
			</form>
			@else
			<form class="form" method="POST" action="{{route('followUser')}}">
			{{csrf_field()}}
			<input type="number" name="user" value="{{$data->id}}" style="display: none;">
			<button class="btn btn-danger form-control" type="submit" style="border-radius:10px ;"><b>Dejar de seguir<img style="float: right;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAb0lEQVRIie2UwQ0AIQgELcHS7Fw6mvt4OWOQnAF/7FczE7NgKZnM1QANqMZ5BZoHDtA1yYD3cedcMgCiSRa4WK88loTBDUkcfCOJhU+CPgnU4iPgsis+Cv6W7JdY0xIi4Vs0tdBF4trmO19FJvM7D54FRVge2oB9AAAAAElFTkSuQmCC"/></b></button>
			</form>
			@endif
			<form>
				<button type="submit" class="btn btn-primary form-control"style="border-radius:10px ;"><b>Añadir Amigo<img style="float: right;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAuklEQVRIie2R4QnDIBCFM4IjOEpG6CgdIZvEDeIGyUZxg68/esJh42GChULzQBC9e9/5HIZbPynAAwuwy1oA39N851N7FwgQxTAATlaQs9gDkMTMqTOXX/FtQKr0ANAKyBHNKqLZiugswKtXaKXaJ58CKEgU0yR7X9SYaoYZQ1wDAA9gPehZgdGCtUwVDoxLTZcAMnnWE5U57z+Z1P1Y9DYBtmxu1GTIZppVmrOcUeOb864BetXd+iO9AKPT4I+iKDX1AAAAAElFTkSuQmCC"/></b></button>
			</form>
			
			<hr>
			<p><b>Pais: </b><span style="font-size: small;">{{$data->country}}</span></p>
			<p><b>Sitio web: </b><a href="#" style="font-size: small;">{{$data->website}}</a></p>
			<p><b>Descripción: </b><span style="font-size: small;">{{$data->description}}</span></p>
			<hr>
			<h4><b>Autores Seguidos</b></h4>
			<p>----</p>
			<hr>
			<h4><b>Amigos</b></h4>
			<p>----</p>
		</div>
		<div class="col-6">
			<h4><b>Publicaciones y reviews</b></h4>
		@foreach($reviews as $review)
			@if($review->type==1)
			<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="container py-2">
				<div class="row" >
					<div class="col-2">
						<img src="{{asset('users_image/'.$review->image_user)}}" width="80%" height="60rem" style="border-radius: 100%;">
					</div>
					<div class="col-8">
						<span class="d-block"><b>{{$review->name_user}}</b></span>
						<span style="font-size: smaller;" class="text-muted">{{$review->created_at}}</span>
					</div>
					<div class="col-2">
						<span>{{str_repeat("★",$review->calification)}}</span>	
					</div>
				</div>
				<p style="font-size: small;">{{$review->description}}</p>
				<div class="row py-2" style="border-radius: 15px;border: solid 2px #f2f2f2;">
					<div class="col-3">
						<img src="{{asset('books_image/'.$review->image)}}" width="100%" height="140rem" style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">
					</div>
					<div class="col-9">
						<h5 style="font-size: small;"><b>{{$review->title}}</b></h5>
						<span class="text-muted" style="font-size: small;">{{$review->name}}</span>
						<p style="font-size: small;">{{$review->synopsis}}</p>
						<button class="btn btn-primary btn-sm badge">Agregar a biblioteca</button>
						<button class="btn btn-primary btn-sm badge">Comprar</button>
					</div>
				</div>
			</div>
			<br><hr><br>
			@elseif($review->type==2)
			<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="container py-2">
				<div class="row" >
					<div class="col-2">
						<img src="{{asset('users_image/'.$review->image_user)}}" width="80%" height="60rem" style="border-radius: 100%;">
					</div>
					<div class="col-8">
						<span class="d-block"><b>{{$review->name_user}}</b></span>
						<span>{{$review->created_at}}</span>
					</div>
				</div>
				<br>
				<p style="font-size: small;">{{$review->description}}</p>
			</div>
				<br><hr><br>
			@endif
			@endforeach		<hr>
			<hr>
		</div>
		<div class="col-2">
			<h4><b>Libros Favoritos</b></h4>
			<p>-----------</p>
			<hr>
			<h4><b>Retos</b></h4>
			<p>-----------</p>
			<hr>
			<h4><b>Publicidad</b></h4>
			<p>-----------</p>
			<hr>
		</div>
	</div>
	<hr>
</div>
@endsection
@section('js')
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
