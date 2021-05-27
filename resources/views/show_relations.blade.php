@extends('layouts.master')
@include('components.navbar_user')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/stars.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
@endsection


@section('content')
<div class="container">
		<h4 style="text-align: center;"><b>Relaciones-Personas</b></h4>
		<br>
	<div class="row">
		@foreach($data as $relation)
		<div class="col-3 my-4" style="font-size: small;">
			<a href="{{route('showUserUser',$relation->id)}}"><img src="{{asset('users_image/'.$relation->image)}}" width="100%" height="200px" style="border-radius: 100%;"></a>	
			<a href="{{route('showUserUser',$relation->id)}}" class="link-dark" style="text-decoration: none;"><h5 style="text-align: center;"><b>{{$relation->name}}</b></h5></a>
			<p style="text-align: center;" class="text-muted">{{$relation->country}}</p>
		</div>
		@endforeach
	</div>
</div>
@endsection


@section('js')
@routes
<script src="{{asset('js/search_nav.js')}}"></script>
<script src="{{asset('js/show_comments.js')}}"></script>
@endsection
