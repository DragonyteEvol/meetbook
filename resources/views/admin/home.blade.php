@extends('layouts.master')
@include('components.navbar')
@section('content')
<div class="container">
	<a href="users"><button class="btn btn-outline-primary">Users</button></a>
	<a href="books"><button class="btn btn-outline-primary">Books</button></a>
	<a href="authors"><button class="btn btn-outline-primary">Authors</button></a>
</div>
@endsection

