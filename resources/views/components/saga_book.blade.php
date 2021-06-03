@if(count($relations)>0)
<div style="border: #f2f2f2 solid 1px;border-radius: 15px;" class="p-2 mx-1">
<h4><b>{{$relations[0]->name_saga}} Saga</b></h4>
<div class="row">
	@foreach($relations as $relation)
	<div class="col-3">
		<a href="{{route('showBookUser',$relation->id)}}"><img src="{{asset('books_image/' . $relation->image)}}" width="100%" height="85rem" style="margin-bottom: 2px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;" title="{{$relation->title}}"></a>
	</div>
	@endforeach
</div>	
<div>
	<a href="{{route('showSagaUser',$relations[0]->name_saga)}}" class="link-dark"><b>Ver más</b></a>	
</div>
</div>
<hr>
@endif
