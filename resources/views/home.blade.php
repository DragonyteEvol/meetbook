@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-2">
		</div>
		<div class="col-8">
			<h4><b>Ultimas Publicaciones</b></h4>
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
							<button type="submit" class="btn btn-primary my-1 float-end"><b>Publicar</b></button>		
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
						<a class="link-dark" style="text-decoration: none;" href="{{route('showUserUser',$review->user_id)}}"><img src="{{asset('users_image/'.$review->user_image)}}" width="80%" height="60rem" style="border-radius: 100%;"></a>	
					</div>
					<div class="col-8">
						<a class="link-dark" style="text-decoration: none;" href="{{route('showUserUser',$review->user_id)}}"><span class="d-block"><b>{{$review->user_name}}</b></span></a>	
						<span class="small">{{$review->created_at}}</span>
					</div>
					<div class="col-2">
						<span>{{str_repeat("★",$review->calification)}}</span>	
					</div>
				</div>
				<p style="font-size: small;">{{$review->description}}</p>
				<div class="row py-2" style="border-radius: 15px;border: solid 2px #f2f2f2;">
					<div class="col-3">
						<a class="link-dark" style="text-decoration: none;" href="{{route('showBookUser',$review->book_id)}}"><img src="{{asset('books_image/'.$review->image)}}" width="100%" height="140rem" style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;"></a>	
					</div>
					<div class="col-9">
						<a class="link-dark" style="text-decoration: none;" href="{{route('showBookUser',$review->book_id)}}"><h5><b>{{$review->title}}</b></h5></a>	
						<a class="link-dark" style="text-decoration: none;"  href="{{route('showAuthorUser',$review->author_id)}}"><span class="text-muted" style="font-size: small;">{{$review->name}}</span></a>	
						<p style="font-size: small;">{{$review->synopsis}}</p>
						<button class="btn btn-primary btn-sm badge">Agregar a biblioteca</button>
						<button class="btn btn-primary btn-sm badge">Comprar</button>
					</div>
				</div>
				@elseif($review->type==2)
				<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="container py-2">
					<div class="row" >
						<div class="col-2">
							<a class="link-dark" style="text-decoration: none;" href="{{route('showUserUser',$review->user_id)}}"><img src="{{asset('users_image/'.$review->user_image)}}" width="80%" height="60rem" style="border-radius: 100%;"></a>	
						</div>
						<div class="col-8">
							<a class="link-dark" style="text-decoration: none;" href="{{route('showUserUser',$review->user_id)}}"><span class="d-block"><b>{{$review->user_name}}</b></span></a>	
							<span class="small">{{$review->created_at}}</span>
						</div>
					</div>
					<br>
					<p class="small" style="font-size: small;">{{$review->description}}</p>
					@endif
					@include('components.like_dislike_comment')	
					@include('components.comments')
				</div>
				<br>
				@endforeach
				<div class="col-12">
					{{$reviews->links()}}
				</div>	

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
