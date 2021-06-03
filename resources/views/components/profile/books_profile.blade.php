<div class="col-2">
	<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="p-2">
		<h5><b>Libros Favoritos</b></h5>
		<hr>
		<div class="row">
			@foreach($favorites as $favorite)
			<div class="col-6">
				<a href="{{route('showBookUser',$favorite->id)}}"><img src="{{asset('books_image/'.$favorite->image)}}" title="{{$favorite->title}}" width="100%" height="86rem" style="border-radius: 5px;" class="my-1"></a>	
			</div>
			@endforeach
			<a href="{{route('showLibraryFavorite',Auth::user()->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
		</div>
	</div>
	<hr>
	<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="p-2">
		<h5><b>Libros leidos</b></h5>	
		<hr>
		<div class="row">
			@foreach($reads as $read)
			<div class="col-6">
				<a href="{{route('showBookUser',$read->id)}}"><img src="{{asset('books_image/'.$read->image)}}" title="{{$read->title}}" width="100%" height="86rem" style="border-radius: 5px;" class="my-1"></a>	
			</div>
			@endforeach
			<a href="{{route('showLibraryRead',Auth::user()->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
		</div>

	</div>
	<hr>
	<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="p-2">
		<h5><b>Leyendo</b></h5>	
		<hr>
		<div class="row">
			@foreach($readings as $reading)
			<div class="col-6">
				<a href="{{route('showBookUser',$reading->id)}}"><img src="{{asset('books_image/'.$reading->image)}}" title="{{$reading->title}}" width="100%" height="86rem" style="border-radius: 5px;" class="my-1"></a>	
			</div>					
			@endforeach
			<a href="{{route('showLibraryReading',Auth::user()->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
		</div>
	</div>
	<hr>
	<div style="border-radius: 15px;border: solid 2px #f2f2f2;" class="p-2">
		<h5><b>Quiero Leer</b></h5>	
		<hr>
		<div class="row">
			@foreach($desires as $desire)
			<div class="col-6">
				<a href="{{route('showBookUser',$desire->id)}}"><img src="{{asset('books_image/'.$desire->image)}}" title="{{$desire->title}}" width="100%" height="86rem" style="border-radius: 5px;" class="my-1"></a>	
			</div>
			@endforeach
			<a href="{{route('showLibraryDesire',Auth::user()->id)}}" style="font-size: small;" class="link-dark"><b>Ver más<img width="14rem" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWklEQVRIie2UMQqAMBDA0k9Lf+AqCA5CB8F/6tKhw43NULhA14Qex0GSdCpwWvId+Pq7jcA1BNaOtCBSZgZKEHmMyGtG1F/oI1Ll0Zqq8qnopwJgAw5LnizODxAKMnEa9zMcAAAAAElFTkSuQmCC"/></b></a>
		</div>

	</div>
</div>

