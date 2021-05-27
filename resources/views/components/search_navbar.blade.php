<form method="GET" action="{{route('searchBookProfile')}}">
	{{csrf_field()}}
	<input type="search" required id="search" class="form-control" autocomplete="off" style="border-radius: 10px;font-size: small;" placeholder="Buscar Libros,Persona o Autores" name="search">
	<div id="autocomplete" style="position: absolute;">
	
	</div>
</form>
