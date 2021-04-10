@extends('layouts.master')
@include('components.navbar')
@section('content')
<h4>Libros</h4>
	<form method="GET" action="{{route('insertBook')}}">
		{{csrf_field()}}
		<input type="submit" value="Crear Libro" class="btn btn-outline-success">
	</form>
	<div>
		<input type="search" placeholder="Buscar libros" name="search" id="search" class="form-control">
</div>
<br>
<div id="body_data">
	@foreach($data as $book)
	<div class="card" style="width: 17rem; display: inline-flex;">
		<img src="../books_image/{{$book->image}}" class="card-img-top" style="height: 300px;">
		<div class="card-body">
			<a href="books/show/{{$book->id}}" class="link-dark"><h3 class="card-title">{{$book->title}}</h4></a>
			<h5 class="card-subtitle mb-2 text-muted">{{$book->name_author}}</h5>
			<p class="card-text">{{$book->synopsis}}</p>
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
							url : "{{route('searchBook')}}",
							method : "GET",
							data : {
								_token : $('input[name="_token"]').val(),
								text : $('#search').val()
								}
						}).done(function(datajson){
								var data=JSON.parse(datajson);
								var print="";
							for(i=0;i<data.length;i++){
									print+='<div class="card" style="width: 17rem; display: inline-flex;">';
									print+='<img src="{{asset('books_image')}}/'+data[i].image +'" class="card-img-top" style="height: 300px;">'
									print+= '<div class="card-body"> <a href="books/show/'+data[i].id+'" class="link-dark"><h3 class="card-title">'+data[i].title+'</h4></a>';
									print+= '<h5 class="card-subtitle mb-2 text-muted">'+data[i].name+'</h5> <p class="card-text">'+data[i].synopsis +'</p> </div></div>';
								}
								document.getElementById('body_data').innerHTML=print;
								console.log(datajson);	
							})
				})	
		})
</script>
@endsection
