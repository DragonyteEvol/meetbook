@extends('layouts.master')
@include('components.navbar')
@section('content')
<table class="table">
	<tr>
		<td>Name</td>
		<td>Email</td>
		<td>Image</td>
		<td>Admin</td>
		<td>First</td>
	</tr>
	@foreach($data as $user)
	<tr>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td><img style="border-radius: 150px;"  src="../users_image/{{$user->image}}" width="50px;" height="50px"></td>
		<td>{{$user->admin}}</td>
		<td>{{$user->first}}</td>
		<td><form action="{{route('deleteUser',$user->id)}}" method="POST">{{csrf_field()}}@method('DELETE')<input type="submit" class="btn btn-outline-danger" value="DELETE"></form></td>
	</tr>
	@endforeach
</table>
@endsection
