@extends('layouts.master')
@include('components.navbar')
@section('content')
<div class="container">
	<div style="width: 50%;display: inline-flex;">
		<img src="{{asset('users_image/' . $data->image)}}" style="width: 200px;border-radius: 100%;" class="mx-2">
		<div>
			<span class="align-top"><b class="fs-2">{{$data->name}}    </b><a>Editar Perfil</a></span>
			<p style="display: inline-block;" class="align-middle"><b>Descripción:</b> Me gusta leer ficcion y soy autor de la saga de libros luna de pluton empece en este mundo a una edad muy temprana mi autor favorito es maluma</p>
			<span class=""><b>Cuenta creada:</b>{{$data->created_at}}</span>
		</div>
	</div>
	<hr>
</div>
@endsection
