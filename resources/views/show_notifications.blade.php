@extends('layouts.master')
@include('components.navbar_user')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/stars.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
@endsection
@section('content')
<div class="cotainer justify-content-center">
	<div class="row">
		<div class="col-5">
			<h4><b>Notificaciones leidas</b></h4>
			@foreach(auth()->user()->readNotifications as $notification)
			<div class="row p-3 my-2" style="border: solid #f2f2f2 1px;border-radius: 15px;background-color: #f2f2f2;">
				<div class="col-3">
					<img src="{{asset('users_image/'.$notification->data['image'])}}" width="100%" height="80px">
				</div>
				<div class="col-7">
					<span><b>{{$notification->data['name']}}</b></span>
					<p>{{$notification->data['message']}}</p>
				</div>
				@if($notification->data['type']=="friend")
				<div class="col-2 align-middle p-1">
					<form action="{{route('allowFriend')}}" method="POST" style="display: inline;">
						{{csrf_field()}}
						<button type="submit" class="btn btn-primary btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Aceptar</button>	
					</form>
					<form action="{{route('declineFriend')}}" method="POST" style="display: inline;">
						@method('DELETE')
						{{csrf_field()}}
						<button type="submit" class="btn btn-danger btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Rechazar</button>	
					</form>
				</div>
				@else
				<div class="col-2 align-middle p-1">
					<a href="{{route('showPostUserNotification',$notification->data['post_id'].'#comment'.$notification->data['comment_id'])}}"><button type="submit" class="btn btn-primary btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Ver</button></a>
				</div>

				@endif
			</div>
			@endforeach
		</div>
		<div class="col-5">
			<h4><b>Notificaciones no leidas</b></h4>
			@foreach(auth()->user()->unreadNotifications as $notification)
			<div class="row p-3 my-2" style="border: solid #f2f2f2 1px;border-radius: 15px;">
				<div class="col-3">
					<img src="{{asset('users_image/'.$notification->data['image'])}}" width="100%" height="80px">
				</div>
				<div class="col-7">
					<span><b>{{$notification->data['name']}}</b></span>
					<p>{{$notification->data['message']}}</p>
				</div>
				@if($notification->data['type']=="friend")
				<div class="col-2 align-middle p-1">
					<form action="{{route('allowFriend')}}" method="POST" style="display: inline;">
						{{csrf_field()}}
						<button type="submit" class="btn btn-primary btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Aceptar</button>	
					</form>
					<form action="{{route('declineFriend')}}" method="POST" style="display: inline;">
						@method('DELETE')
						{{csrf_field()}}
						<button type="submit" class="btn btn-danger btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Rechazar</button>	
					</form>
				</div>
				@else
				<div class="col-2 align-middle p-1">
					<a href="{{route('showPostUserNotification',$notification->data['post_id'].'#comment'.$notification->data['comment_id'])}}"><button type="submit" class="btn btn-primary btn-sm badge" value="{{$notification->data['user_id']}}" name="friend">Ver</button></a>
				</div>
				@endif
			</div>
			</a>
			@endforeach

		</div>
	</div>

</div>
@endsection
@section('js')
@routes
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
