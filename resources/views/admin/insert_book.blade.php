@extends('layouts.master')
@include('components.navbar')
@section('css')
<link rel="stylesheet" href="{{asset('resource/jquery_ui/jquery-ui.min.css')}}">
@endsection
@section('content')
<h4>Libro Nuevo</h4>
<form class="form" method="POST" action="{{route('storeBook')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<label class="form-label">Titulo</label>
	<input type="text" name="title" class="form-control">
	<label class="form-label">Author</label>
	<input type="text" name="id_author"class="form-control" id="author">
	<div id="search"></div>
	<label class="form-label">Saga</label>
	<input type="text" name="name_saga"class="form-control">
	<label class="form-label">Sinopsis</label>
	<textarea class="form-control" name="synopsis"></textarea>
	<label class="form-label">Paginas</label>
	<input type="number" name="sheets"class="form-control">
	<label class="form-label">Fecha de publicación</label>
	<input type="date" name="date"class="form-control">
	<label class="form-label">Lenguajes</label>
	<input type="text" name="languages"class="form-control">
	<label class="form-label">Numero de lecturas</label>
	<input type="number" name="reads"class="form-control">
	<label class="form-label">Imagen de portada</label>
	<input type="file" name="image"class="form-control"><br>
	<input type="submit" class="btn btn-outline-primary btn-block" value="Crear Libro">
</form>
@endsection
@section('js')
<script src="{{asset('resource/jquery.js')}}"></script>
<script>
$(document).ready(function(){
	$('#author').keyup(function(){
		$.ajax({
		url : "{{route('searchIdAuthor')}}",
		method : "GET",
		data : {
			_token : $('input[name="_token"]').val(),
				text : $('#author').val()
		}
	}).done(function(datajson){
		var data = JSON.parse(datajson);
		var print = "<ul class='dropdown-menu' style='display:block;position:relative'>"
		for(var i=0;i<data.length;i++){
			print+="<li onclick='identify("+data[i].id+")'>"+data[i].name+"</li>";
		}
		print+="</ul>";
		document.getElementById('search').innerHTML=print;
	})
	})

})
</script>
<script>
	function identify(value){
		document.getElementById('author').value=value;
	}
</script>
@endsection
