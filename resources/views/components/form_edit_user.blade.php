<div>
	<form class="form" action="{{route('editDataUser')}}" method="POST">
		@method('PUT')
		{{csrf_field()}}
		<p><b>Pais: </b><span style="font-size: small;">{{Auth::user()->country}}</span></p>
		<p><b>Sitio web: </b><input style="font-size: small;" class="form-control" type="text" name="website" value="{{Auth::user()->website}}"></p>
		<p><b>Descripción: </b><textarea style="font-size: small;" class="form-control" name="description">{{Auth::user()->description}}</textarea></p>
		<button type="submit" class="btn btn-primary form-control">Guardar</button>
	</form>
</div>
