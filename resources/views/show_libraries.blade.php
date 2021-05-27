@extends('layouts.master')
@include('components.navbar_user')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/stars.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/paginator.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
@endsection


@section('content')
<div class="container">
		<h4 style="text-align: center;"><b>Librerias</b></h4>
		<br>
	<div class="row justify-content-center">
		@foreach($data as $book)
		<div class="col-5 m-2 p-2" style="font-size: small;border-radius: 5px;border: solid #f2f2f2 1px;">
			<div class="row">
				<div class="col-6">
					<a href="{{route('showBookUser',$book->id)}}"><img style="border-radius: 5px;" src="{{asset('books_image/'.$book->image)}}" width="100%" height="300px"></a>	
				</div>
				<div class="col-6">
					<div class="align-middle">
					<a class="link-dark" style="text-decoration: none;" href="{{route('showBookUser',$book->id)}}"><h5 ><b>{{$book->title}}</b></h5></a>
					<p >{{$book->synopsis}}</p>
					</div>
				</div>
			</div>
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
