@extends('layouts.master')
@include('components.navbar_user')
@section('content')
{{route('showUserUser',1)}}
@endsection
@section('js')
<script src="{{asset('js/search_nav.js')}}"></script>
@endsection
