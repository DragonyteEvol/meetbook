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
@include('components.like_dislike_comment')
@include('components.comments')
</div>
<br>
@endforeach


