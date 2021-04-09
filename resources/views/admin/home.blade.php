@extends('layouts.master')
@include('components.navbar')
@section('content')
<div class="container">
	<a href="users"><div class="card bg-dark text-white" style="width: 300px;display: inline-block;height: 200px;">
			<img src="{{asset('web_image/users_admin.jpg')}}" class="card-img" alt="..." width="150px">
			<div class="card-img-overlay">
				<h5 class="card-title fs-6">USUARIOS</h5>
			</div>
		</div></a>
		<a href="books"><div class="card bg-dark text-white" style="width: 300px;display: inline-block;height: 200px;">
				<img src="{{asset('web_image/books_admin.jpg')}}" class="card-img" alt="..." width="150px">
				<div class="card-img-overlay">
					<h5 class="card-title fs-6">LIBROS</h5>
				</div>
			</div></a>
			<a href="authors"><div class="card bg-dark text-white" style="width: 300px;display: inline-block;height: 200px;">
					<img src="{{asset('web_image/authors_admin.jpg')}}" class="card-img" alt="..." width="150px">
					<div class="card-img-overlay">
						<h5 class="card-title fs-6">AUTORES</h5>
					</div>
				</div></a>
</div>
@endsection

