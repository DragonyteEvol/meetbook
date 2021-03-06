@extends('layouts.master')
@include('components.navbar_user')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/stars.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-2">
			<!-- DATA EN PROCESO -->
		</div>
		<div class="col-8">
			@foreach($reviews as $review)
			@if($review->type==1)
			<div  id="review{{$review->id}}"style="border-radius: 15px;border: solid 2px #f2f2f2;" class="container py-2">
				<div class="row" >
					<div class="col-2">
						<a href="{{route('showUserUser',$review->user_id)}}"><img src="{{asset('users_image/'.$review->image_user)}}" width="80%" height="60rem" style="border-radius: 100%;"></a>	
					</div>
					<div class="col-8">
						<a href="{{route('showUserUser',$review->user_id)}}" class="link-dark" style="text-decoration: none;"><span class="d-block"><b>{{$review->name_user}}</b></span></a>	
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
				@elseif($review->type==2)
				<div  id="review{{$review->id}}"style="border-radius: 15px;border: solid 2px #f2f2f2;" class="container py-2">
					<div class="row" >
						<div class="col-2">
							<a href="{{route('showUserUser',$review->user_id)}}"><img src="{{asset('users_image/'.$review->image_user)}}" width="80%" height="60rem" style="border-radius: 100%;"></a>	
						</div>
						<div class="col-8">
							<a href="{{route('showUserUser',$review->user_id)}}" class="link-dark" style="text-decoration: none;"><span class="d-block"><b>{{$review->name_user}}</b></span></a>	
							<span class="small">{{$review->created_at}}</span>
						</div>
					</div>
					<br>
					<p class="small" style="font-size: small;">{{$review->description}}</p>
					@endif
					<div class="my-2" style="font-size: small;">
						<div class="row justify-content-center">
							<div class="col-3">
								@if(isset($review->like))
								<a id="linklike{{$review->id}}"  href="#review{{$review->id}}" onclick="likePost({{$review->id}})" class="{{$review->like ? 'link-primary' : 'link-dark'}}"><b>Me gusta</b></a>
								@else
								<a id="linklike{{$review->id}}"  href="#review{{$review->id}}" onclick="likePost({{$review->id}})" class="link-dark"><b>Me gusta</b></a>
								@endif
							</div>
							<div class="col-3">
								@if(isset($review->like))
								<a id="linkdislike{{$review->id}}"  href="#review{{$review->id}}" onclick="dislikePost({{$review->id}})" class="{{$review->like ? 'link-dark' : 'link-primary'}}"><b>No me gusta</b></a>
								@else
								<a id="linkdislike{{$review->id}}"  href="#review{{$review->id}}" onclick="dislikePost({{$review->id}})" class="link-dark"><b>No me gusta</b></a>
								@endif
							</div>

						</div>
						<br>
<div class="container py-1" id="comment{{$review->id}}" style="border: solid #f2f2f2 2px;border-radius: 15px;">
	<div class="row">
		<div class="col-3">
			<img src="{{asset('users_image/'.Auth::user()->image)}}" width="80%" height="75px" style="border-radius: 100%;">
		</div>
		<div class="col-9">
			<form class="form" action="{{route('commentPost',$review->id)}}" method="POST">
				{{csrf_field()}}
				<div class="input-group align-middle my-3">
					<input style="border-radius: 5px;font-size: small;" type="text" name="description" class="form-control" placeholder="Escribe aqui tu comentario">
				</div>
			</form>
		</div>
	</div>
</div>
<hr>

						@foreach($comments as $comment)
						<div style='border-bottom:2px solid #f2f2f2' class='row justify-content-between my-1' id="comment{{$comment->id}}">
							<div class='col-2'><img src="{{asset('users_image/'.$comment->image)}}" width='80%' height='45px' style='border-radius:100%'>
								<span>{{$comment->created_at}}<span>
							</div>
							<div class='col-9'><h4 style='font-size:small'>
									<b>{{$comment->name}}</b></h4><span class='align-middle'>{{$comment->description}}</span>
							</div>
						</div>
						@endforeach

					</div>
				</div>
				@endforeach


			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
@routes
<script src="{{asset('js/search_nav.js')}}"></script>
<script src="{{asset('js/show_comments.js')}}"></script>
@endsection
