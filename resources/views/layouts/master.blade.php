<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		@yield('css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@300&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
		<style>
body{
font-family: 'Roboto', sans-serif;
	font-family: 'Montserrat', sans-serif;
}
</style>
	</head>
	<body>
		<div class="container">
			@yield('content')
<script>
    var url_global='{{url("/")}}';
    var asset_global='{{asset("/")}}';
    var asset_user_global='{{asset("/users_image")}}';//solo es un ejemplo en caso de que tengas un mapeo organizado de carpetas.
</script>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script src="{{asset('resource/jquery.js')}}"></script>
		<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
		@yield('js')
	</body>
</html>
