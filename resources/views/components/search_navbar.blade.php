<form class="" method="GET" action="{{route('searchBookProfile')}}">
	{{csrf_field()}}
	<div>
	<input type="search" required id="search" class="form-control" autocomplete="off" style="border-radius: 10px;font-size: small;" placeholder="Buscar Libros,Persona o Autores" name="search">
	</div>
	<div id="autocomplete" style="position: absolute;width: 285px" class="">
	
	</div>
</form>
