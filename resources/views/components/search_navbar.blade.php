<form method="GET" action="{{route('searchBookProfile')}}">
	{{csrf_field()}}
	<input type="search" id="search" class="form-control" autocomplete="off" placeholder="Buscar Libros,Persona o Autores" name="search">
	<div id="autocomplete" style="position: absolute;">
	
	</div>
</form>
