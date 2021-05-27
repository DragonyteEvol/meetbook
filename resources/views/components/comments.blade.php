<div style="font-size: small;" class="container"  id="{{$review->id}}"></div>
<div class="container" style="display: none;" id="comment{{$review->id}}">
	<div class="row py-1">
		<div class="col-3">
			<img src="{{asset('users_image/'.Auth::user()->image)}}" width="60%" height="75px" style="border-radius: 100%;">
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

