@extends('layouts.master')
@include('components.navbar')
@section('content')
<h4>Autores</h4>
<form method="GET" action="{{route('insertAuthor')}}">
	{{csrf_field()}}
	<input type="submit" class="btn btn-outline-success"  value="Crear Autor">
</form>
<div>
	<input type="search" placeholder="Buscar autor" id="search" class="form-control">
</div>
<br>
<div id="data_body">
@foreach($data as $author)
<div class="card" style="width: 17rem;display: inline-flex;">
	<div class="card-body">
		<a href="{{route('showAuthor',$author->id)}}" class="link-dark" style="text-decoration: none;"><h3 class="card-title">{{$author->name}}</h3></a>
		<h5 class="card-subtitle">{{$author->nacionality}}</h5>
		<p class="card-text">{{$author->description}}</p>
	</div>
</div>
@endforeach
</div>
@endsection
@section('js')
<script src="{{asset('resource/jquery.js')}}"></script>
<script>
	$(document).ready(function(){
		$('#search').keyup(function(){
				$.ajax({
						url : "{{route('searchAuthor')}}",
						method : "GET",
						data : {
							_token : $('input[name="_token"]').val(),
							text : $('#search').val()
							}
					}).done(function(datajson){
							var data=JSON.parse(datajson);
							var print="";
							for(var i=0;i<data.length;i++){
								print+='<div class="card" style="width: 17rem;display: inline-flex;"><div class="card-body">';
								print+='<a href="authors/show/'+data[i].id+'" class="link-dark" style="text-decoration: none;"><h3 class="card-title">'+data[i].name+'</h3></a>'
								print+= '<h5 class="card-subtitle">'+data[i].nacionality+'</h5> <p class="card-text">'+data[i].description+'</p></div></div>'
								}
							document.getElementById('data_body').innerHTML=print;
						})
			})
		})
</script>
@endsection
