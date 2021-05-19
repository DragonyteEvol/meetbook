@extends('layouts.master')
@include('components.navbar_user')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/stars.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-3">
			<img src="{{asset('users_image/'.Auth::user()->image)}}" width="100%" height="300rem" style="border-radius: 100%;">
			<h4 style="text-align: center;"><b>{{Auth::user()->name}}</b></h4>
			<hr>
			<a href="#" style="float: right;font-size: small;">(editar)</a>
			<p><b>Pais: </b><span style="font-size: small;">{{Auth::user()->country}}</span></p>
			<p><b>Sitio web: </b><a href="#" style="font-size: small;">{{Auth::user()->website}}</a></p>
			<p><b>Descripción: </b><span style="font-size: small;">{{Auth::user()->description}}</span></p>
			<hr>
	<div class="row" style="border-radius: 15px;border: solid 2px #f2f2f2;">
				<h4><b>Amigos </b><span style="font-size: small;" class="text-muted">({{$friends_count}})</span></h4>
					@foreach($friends as $friend)
					<div class="col-12 mx-auto" style="border-radius: 15px;border: solid 2px #f2f2f2;width: 95%;">
						<a class="link-dark" style="display: inline;text-decoration: none;" href="{{route('showUserUser',$friend->id)}}"><img class="my-1" src="{{asset('users_image/'.$friend->image)}}" title="{{$friend->name}}" width="30%" style="border-radius: 100%;" height="65px">
							<div style="display: inline-block;" class="align-middle">
								<span ><b>{{$friend->name}}</b></span>
								<span class="text-muted" style="display: block;font-size: small;">{{ \Carbon\Carbon::parse($friend->created_at)->diffForHumans() }}</span>
							</div>

						</a>	
					</div>
					@endforeach
					<a href="#" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>

			</div>

			<hr>
			<div>
				<div class="row" style="border-radius: 15px;border: solid 2px #f2f2f2;">
				<h4><b>Seguidores </b><span style="font-size: small;" class="text-muted">({{$followers_count}})</span></h4>
					@foreach($followers as $follower)
					<div class="col-3">
						<a href="{{route('showUserUser',$follower->user_id)}}"><img class="my-1" src="{{asset('users_image/'.$follower->image)}}" title="{{$follower->name}}" width="100%" style="border-radius: 100%;" height="45rem"></a>	
					</div>
					@endforeach
					<a href="#" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
				</div></div>
				<hr>
				<div>
					<div class="row" style="border-radius: 15px;border: solid 2px #f2f2f2;">
				<h4><b>Personas a las que sigues </b><span style="font-size: small;" class="text-muted">({{$follows_count}})</span></h4>
						@foreach($follows as $follow)
						<div class="col-3">
							<a href="{{route('showUserUser',$follow->target_id)}}"><img class="my-1" src="{{asset('users_image/'.$follow->image)}}" title="{{$follow->name}}" width="100%" style="border-radius: 100%;" height="45rem"></a>	
						</div>
						@endforeach
						<a href="#" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
					</div>

				</div>
		</div>
		<div class="col-7">
			<h4><b>Publicaciones y reviews</b></h4>
			<hr><br>
			<div class="row">
				<div class="col-2">
					<img src="{{asset('users_image/'.Auth::user()->image)}}" width="80%" height="75rem" style="border-radius: 100%;">
				</div>
				<div class="col-10">
					<form class="form" method="POST" action="{{route('storePostUser',Auth::user()->id)}}">
						{{csrf_field()}}
						<div class="form-floating">
							<textarea name="description" class="form-control" placeholder="Comenta y comparte" id="floatingTextarea2" style="height: 100px"></textarea>
							<label for="floatingTextarea2">Comparte lo que piensas</label>
							<input type="submit" value="Publicar" class="btn btn-outline-primary my-2" style="float: right;border-radius: 15px;">
						</div>	
					</form>
				</div>
			</div>
			<hr>
			@foreach($reviews as $review)
			@if($review->type==1)
			<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="container py-2">
				<div class="row" >
					<div class="col-2">
						<a href="{{route('showUserUser',$review->user_id)}}"><img src="{{asset('users_image/'.Auth::user()->image)}}" width="80%" height="60rem" style="border-radius: 100%;"></a>	
					</div>
					<div class="col-8">
						<a href="{{route('showUserUser',$review->user_id)}}" class="link-dark" style="text-decoration: none;"><span class="d-block"><b>{{Auth::user()->name}}</b></span></a>	
						<span class="small">{{$review->created_at}}</span>
					</div>
					<div class="col-2">
						<span>{{str_repeat("★",$review->calification)}}</span>	
					</div>
				</div>
				<p style="font-size: small;">{{$review->description}}</p>
				<div class="row py-2" style="border-radius: 15px;border: solid 2px #f2f2f2;">
					<div class="col-3">
						<a href="{{route('showBookUser',$review->book_id)}}"><img src="{{asset('books_image/'.$review->image)}}" width="100%" height="140rem" style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;"></a>	
					</div>
					<div class="col-9">
						<a href="{{route('showBookUser',$review->book_id)}}" class="link-dark" style="text-decoration: none;"><h5><b>{{$review->title}}</b></h5></a>	
						<a href="{{route('showAuthorUser',$review->author_id)}}" class="link-dark" style="text-decoration: none;"><span class="text-muted" style="font-size: small;">{{$review->name}}</span></a>	
						<p style="font-size: small;">{{$review->synopsis}}</p>
						<button class="btn btn-primary btn-sm badge">Agregar a biblioteca</button>
						<button class="btn btn-primary btn-sm badge">Comprar</button>
					</div>
				</div>
				<div class="my-2" style="font-size: small;">
					<div class="row justify-content-center">
						<div class="col-3">
							<a href="#" class="link-dark"><b>Me gusta</b></a>
						</div>
						<div class="col-3">
							<a href="#" onclick="showComments({{$review->id}})" class="link-dark"><b>Comentar</b></a>
						</div>
						<div class="col-3">
							<a href="#" class="link-dark"><b>No me gusta</b></a>
						</div>
					</div>
				</div>
			</div>
			<hr>
			@elseif($review->type==2)
			<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="container py-2">
				<div class="row" >
					<div class="col-2">
						<a href="{{route('showUserUser',$review->user_id)}}"><img src="{{asset('users_image/'.Auth::user()->image)}}" width="80%" height="60rem" style="border-radius: 100%;"></a>	
					</div>
					<div class="col-8">
						<a href="{{route('showUserUser',$review->user_id)}}" class="link-dark" style="text-decoration: none;"><span class="d-block"><b>{{Auth::user()->name}}</b></span></a>	
						<span class="small">{{$review->created_at}}</span>
					</div>
				</div>
				<br>
				<p class="small" style="font-size: small;">{!!$review->description!!}</p>
				<div class="my-2" style="font-size: small;">
					<div class="row justify-content-center">
						<div class="col-3">
							<a href="#" class="link-dark"><b>Me gusta</b></a>
						</div>
						<div class="col-3">
							<a href="#" onclick="showComments({{$review->id}})"  class="link-dark"><b>Comentar</b></a>
						</div>
						<div class="col-3">
							<a href="#" class="link-dark"><b>No me gusta</b></a>
						</div>
					</div>
				</div>

			</div>
			<hr>
			@endif
			@endforeach
			<div class="col-12">
				{{$reviews->links()}}
			</div>	
		</div>
		<div class="col-2">
			<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="p-2">
				<h5><b>Libros Favoritos</b></h5>
				<hr>
				<div class="row">
					@foreach($favorites as $favorite)
					<div class="col-6">
						<a href="{{route('showBookUser',$favorite->id)}}"><img src="{{asset('books_image/'.$favorite->image)}}" title="{{$favorite->title}}" width="100%" height="86rem" style="border-radius: 5px;" class="my-1"></a>	
					</div>
					@endforeach
					<a href="#" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
				</div>
			</div>
			<hr>
			<!--LEIDOS--!>
				<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="p-2">
				<h5><b>Libros leidos</b></h5>	
				<hr>
				<div class="row">
				@foreach($reads as $read)
				<div class="col-6">
				<a href="{{route('showBookUser',$read->id)}}"><img src="{{asset('books_image/'.$read->image)}}" title="{{$read->title}}" width="100%" height="86rem" style="border-radius: 5px;" class="my-1"></a>	
				</div>
				@endforeach
				<a href="#" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
				</div>

				</div>
				<hr>
				<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="p-2">
				<h5><b>Leyendo</b></h5>	
				<hr>
				<div class="row">
				@foreach($readings as $reading)
				<div class="col-6">
				<a href="{{route('showBookUser',$reading->id)}}"><img src="{{asset('books_image/'.$reading->image)}}" title="{{$reading->title}}" width="100%" height="86rem" style="border-radius: 5px;" class="my-1"></a>	
				</div>					
				@endforeach
				<a href="#" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
				</div>
				</div>
				</div>
				</div>
				</div>
				@endsection
				@section('js')
				<script src="{{asset('js/search_nav.js')}}"></script>
				<script>
				
				</script>
				@endsection
