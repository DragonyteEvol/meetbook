<div style="border-bottom: solid grey 0.5px;">
	<div class="container">
		<div style="display: inline-block;margin-right: 20px;">
			<a href="/LARAVEL/meetbook/public/admin/home"><img src="{{asset('web_image/icon.png')}}" width="40px"></a>
		</div>	
		<div style="display: inline-block; margin-top: 5px;">
				<b>{{Auth::user()->name}}</b>
				<form method="POST" action="{{route('logout')}}">
					{{csrf_field()}}
					<input type="submit" value="Cerrar sesión" class="btn btn-outline-danger btn-sm">
				</form>
		</div>
	</div>
</div>
<br>
