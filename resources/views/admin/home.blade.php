@extends('layouts.master')
@include('components.navbar')
@section('content')
<div class="container">
	<a href="users" class="link-dark"><div class="card" style="width: 18rem;display: inline-flex;">
			<img src="{{asset('web_image/users_admin.jpg')}}" class="card-img-top" alt="..." height="150px">
			<div class="card-body">
				<h5 class="card-title">Usuarios</h5>
			</div>
		</div></a>

		<a href="books" class="link-dark"><div class="card" style="width: 18rem;display: inline-flex;">
				<img src="{{asset('web_image/books_admin.jpg')}}" class="card-img-top" alt="..." height="150px">
				<div class="card-body">
					<h5 class="card-title">Libros</h5>
				</div>
			</div></a>

			<a href="authors" class="link-dark"><div class="card" style="width: 18rem;display: inline-flex;">
					<img src="{{asset('web_image/authors_admin.jpg')}}" class="card-img-top" alt="..." height="150px">
					<div class="card-body">
						<h5 class="card-title">Autores</h5>
					</div>
				</div></a>
</div>
@endsection

