<div class="row" style="border-radius: 15px;border: solid 2px #f2f2f2;">
	<h4><b>Amigos </b><span style="font-size: small;" class="text-muted">({{$friends_count}})</span></h4>
	@foreach($friends as $friend)
	<div class="col-12">
		<a class="link-dark" style="display: inline;text-decoration: none;" href="{{route('showUserUser',$friend->id)}}"><img class="my-1" src="{{asset('users_image/'.$friend->image)}}" title="{{$friend->name}}" width="30%" style="border-radius: 100%;" height="65px">
			<div style="display: inline-block;" class="align-middle">
				<span ><b>{{$friend->name}}</b></span>
				<span class="text-muted" style="display: block;font-size: small;">{{ \Carbon\Carbon::parse($friend->created_at)->diffForHumans() }}</span>
			</div>

		</a>	
	</div>
	@endforeach
	<a href="{{route('showRelationFriend',$data->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>

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
		<a href="{{route('showRelationFollower',$data->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
	</div></div>
	<hr>
	<div>
		<div class="row" style="border-radius: 15px;border: solid 2px #f2f2f2;">
			<h4><b>Personas a las que sigue </b><span style="font-size: small;" class="text-muted">({{$follows_count}})</span></h4>
			@foreach($follows as $follow)
			<div class="col-3">
				<a href="{{route('showUserUser',$follow->target_id)}}"><img class="my-1" src="{{asset('users_image/'.$follow->image)}}" title="{{$follow->name}}" width="100%" style="border-radius: 100%;" height="45rem"></a>	
			</div>
			@endforeach
			<a href="{{route('showRelationFollow',$data->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
		</div>

	</div>
