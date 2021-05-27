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
			<img src="{{asset('users_image/'.$data->image)}}" width="100%" height="300rem" style="border-radius: 100%;">
			<h4 style="text-align: center;"><b>{{$data->name}}</b></h4>
			<form class="form" method="POST" action="{{route('followUser')}}">
				{{csrf_field()}}
				<input type="number" name="user" value="{{$data->id}}" style="display: none;">
				<button class="{{$follow_check['class']}}" type="submit" style="border-radius:10px ;"><b>{{$follow_check['message']}}</b></button>
			</form>
			<form class="form" action="{{route('addFriendUser',$data->id)}}" method="POST">
				{{csrf_field()}}
				<button class="{{$friend_check['class']}}" type="submit" style="border-radius:10px ;"><b>{{$friend_check['message']}}</b></button>
			</form>
			<hr>
			<p><b>Pais: </b><span style="font-size: small;">{{$data->country}}</span></p>
			<p><b>Sitio web: </b><a href="#" style="font-size: small;">{{$data->website}}</a></p>
			<p><b>Descripción: </b><span style="font-size: small;">{{$data->description}}</span></p>
			<hr>
			@include('components.user.friends_data_user')
		</div>
		<div class="col-7">
			@include('components.user.reviews_user')
		</div>
		<div class="col-2">
			@include('components.user.books_user')
		</div>
	</div>
</div>
@endsection
@section('js')
@routes
<script src="{{asset('js/search_nav.js')}}"></script>
<script src="{{asset('js/show_comments.js')}}"></script>
@endsection
