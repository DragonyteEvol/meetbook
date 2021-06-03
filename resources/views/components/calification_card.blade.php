<hr>
<div class="row p-1" style="border: 1px #f2f2f2 solid;border-radius: 15px;">
	<h4><b>Calificaciones</b></h4>
	<div class="col-2">
	@foreach($califications as $calification)
	<div><b>{{$calification->calification}}</b></div>
	@endforeach
	</div>
	<div class="col-10" style="font-size: small;">
		@foreach($califications as $calification)
		<a href="{{route('showPostCalification',array($data->id,$calification->calification))}}" title="Ver libros calificados con {{$calification->calification}} por {{$data->name}}"><div class="progress my-1">
			<div class="progress-bar" role="progressbar" style="width: {{($calification->number/$califications_count)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$calification->number}}
			</div>
		</div></a>
		@endforeach

	</div>
</div>
