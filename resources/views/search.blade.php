@extends('layouts.master')
@include('components.navbar_user')
@section('content')
<div class="container">
	<div class="row">
@foreach($data as $info)
@if($info->type==1)
<div class="col-2">
	<a href="{{route('showBookUser',$info->id)}}">
	<div class="card border-0" style="height: 80%;">
		<img src="{{asset('books_image/'.$info->image)}}" class="card-img-top" style="width: 100%;height: 200px;">
		<div class="card-body">
			<p class="card-title"><b>{{$info->name}}</b></p>
		</div>
	</div>
	</a>
	<hr>
</div>
@endif
@if($info->type==2)
<div class="col-2">
	<a href="{{route('showAuthorUser',$info->id)}}">
	<div class="card border-0"style="height: 80%;">
		<img src="{{asset('authors_image/'.$info->image)}}" class="card-img-top" style="width: 100%;height: 200px;border-radius: 20%;">
		<div class="card-body">
			<p class="card-title"><b>{{$info->name}}</b></p>
		</div>
	</div>
</a>
	<hr>
</div>
@endif
@if($info->type==3)
<div class="col-2">
	<a href="{{route('showUserUser',$info->id)}}">
	<div class="card border-0"style="height: 80%;">
		<img src="{{asset('users_image/'.$info->image)}}" class="card-img-top" style="width: 100%;height: 200px;border-radius: 100%;">
		<div class="card-body">
			<p class="card-title"><b>{{$info->name}}</b></p>
		</div>
	</div>
	</a>
	<hr>
</div>
@endif
@endforeach
	</div></div>
	@endsection
	@section('js')
	<script src="{{asset('js/search_nav.js')}}"></script>
	@endsection
