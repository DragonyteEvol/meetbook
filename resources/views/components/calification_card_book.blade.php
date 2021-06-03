@if(count($califications)>0)
<div class="row p-1 mx-1" style="border: 1px #f2f2f2 solid;border-radius: 15px;">
	<h4><b>Calificaciones</b></h4>
	<div class="col-1">
	<div><b>5</b></div>
	<div><b>4</b></div>
	<div><b>3</b></div>
	<div><b>2</b></div>
	<div><b>1</b></div>
	</div>
	<div class="col-11">
		@foreach($califications as $calification)
		<div class="progress mb-2">
			<div class="progress-bar" role="progressbar" style="width: {{(($calification->five_star*5)/$calification->score)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$calification->five_star}}</div>
		</div>
		<div class="progress my-2">
			<div class="progress-bar" role="progressbar" style="width: {{(($calification->four_star*4)/$calification->score)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$calification->four_star}}</div>
		</div>
		<div class="progress my-2">
			<div class="progress-bar" role="progressbar" style="width: {{(($calification->three_star*3)/$calification->score)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$calification->three_star}}</div>
		</div>
		<div class="progress my-2">
			<div class="progress-bar" role="progressbar" style="width: {{(($calification->two_star*2)/$calification->score)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$calification->two_star}}</div>
		</div>
		<div class="progress my-2">
			<div class="progress-bar" role="progressbar" style="width: {{(($calification->one_star*1)/$calification->score)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$calification->one_star}}</div>
		</div>
		@endforeach

	</div>
</div>
@endif
