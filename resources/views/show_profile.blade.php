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
			<form method="POST" enctype="multipart/form-data" action="{{route('editImageUser')}}">
				@method('PUT')
				{{csrf_field()}}
				<div onclick="submitImage({{Auth::user()->id}})" style="border-radius: 100%;width:100%;height:300px;background-image: url({{asset('users_image/'.Auth::user()->image)}});background-size: 100% 300px" class="change-image">
					<input required type="file" name="image" title="Cambiar imagen" style="width: 100%;height: 300px;border-radius: 100%;opacity: 0;">
				</div>
				<div style="display: none;" id="image{{Auth::user()->id}}">
					<button type="submit" class="btn btn-primary form-control align-middle"><b>Guardar</b></button>
				</div>
			</form>
			<h4 style="text-align: center;"><b>{{Auth::user()->name}}</b></h4>
			<hr>
			<a onclick="showFormEdit()" href="#data1" style="float: right;font-size: small;">(editar)</a>
			<div id="data1">
			<p><b>Pais: </b><span style="font-size: small;">{{Auth::user()->country}}</span></p>
			<p><b>Sitio web: </b><a href="#" style="font-size: small;">{{Auth::user()->website}}</a></p>
			<p><b>Descripción: </b><span style="font-size: small;">{{Auth::user()->description}}</span></p>
			</div>
			<hr>
			@include('components.profile.friends_data_profile')
			@include('components.calification_card_profile')
		</div>
		<div class="col-7">
			<h4><b>Publicaciones y reviews</b></h4>
			<hr><br>
			<div class="row">
				<div class="col-2">
					<img src="{{asset('users_image/'.Auth::user()->image)}}" width="80%" height="75rem" style="border-radius: 100%;">
				</div>
				<div class="col-10">
					<form class="form" method="POST" action="{{route('storePostUser',Auth::user()->id)}}">
						{{csrf_field()}}
						<div class="form-floating">
							<textarea name="description" class="form-control" placeholder="Comenta y comparte" id="floatingTextarea2" style="height: 100px"></textarea>
							<label for="floatingTextarea2">Comparte lo que piensas</label>
							<button type="submit" class="btn btn-primary my-1 float-end"><b>Publicar</b></button>		
						</div>	
						<br><br>
					</form>
				</div>
			</div>
			@include('components.profile.reviews_profile')
		</div>
		@include('components.profile.books_profile')
	</div>
</div>
@endsection
@section('js')
@routes
<script src="{{asset('js/search_nav.js')}}"></script>
<script src="{{asset('js/show_comments.js')}}"></script>
<script>
	function submitImage(id){
			name="image"+id;
			document.getElementById(name).style.display="";
		}

	function showFormEdit(){
			$.ajax({
					url: route('showFormEditUser'),
					method: "GET",
					data:{
						}
				}).done(function(data){
						document.getElementById('data1').innerHTML=data;
					})
		}

</script>
@endsection
