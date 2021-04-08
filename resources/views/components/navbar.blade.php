<div style="display: flex;">
	<div class="container">
		<table>
			<tr>
				<td style="font-size: 15px;"><b>{{Auth::user()->name}}</b></td>
			</tr>
			<tr>
				<form method="POST" action="{{route('logout')}}">
					{{csrf_field()}}
					<input type="submit" value="Cerrar sesión" class="btn btn-outline-danger btn-sm">
				</form>
			</tr>
		</table>
	</div>
</div>
<hr>
