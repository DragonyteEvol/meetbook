@extends('layouts.master')
@include('components.navbar_user')
@section('content')
@foreach($data as $info)
<div>
	{{$info->name}}
</div>
@endforeach
@endsection
@section('js')
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
