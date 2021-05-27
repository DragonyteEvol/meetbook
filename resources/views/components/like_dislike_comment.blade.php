<div class="my-3" style="font-size: small;">
	<div class="row justify-content-center">
		<div class="col-3">
			@if(isset($review->like))
			<a id="linklike{{$review->id}}"  href="#review{{$review->id}}" onclick="likePost({{$review->id}})" class="{{$review->like ? 'link-primary' : 'link-dark'}}"><b>Me gusta</b><span>@if(isset($review->likes)) ({{$review->likes}}) @endif </span></a>
			@else
			<a id="linklike{{$review->id}}"  href="#review{{$review->id}}" onclick="likePost({{$review->id}})" class="link-dark"><b>Me gusta</b><span>@if(isset($review->likes)) ({{$review->likes}}) @endif </span></a>
			@endif
		</div>
		<div class="col-3">
			<a href="#review{{$review->id}}" onclick="showComments({{$review->id}})" class="link-dark"><b>Comentar</b><span>@if(isset($review->comments)) ({{$review->comments}}) @endif </span></a>
		</div>
		<div class="col-3">
			@if(isset($review->like))
			<a id="linkdislike{{$review->id}}"  href="#review{{$review->id}}" onclick="dislikePost({{$review->id}})" class="{{$review->like ? 'link-dark' : 'link-primary'}}"><b>No me gusta</b><span>@if(isset($review->dislikes)) ({{$review->dislikes}}) @endif </span></a>
			@else
			<a id="linkdislike{{$review->id}}"  href="#review{{$review->id}}" onclick="dislikePost({{$review->id}})" class="link-dark"><b>No me gusta</b><span>@if(isset($review->dislikes)) ({{$review->dislikes}}) @endif </span></a>
			@endif
		</div>

	</div>
</div>

