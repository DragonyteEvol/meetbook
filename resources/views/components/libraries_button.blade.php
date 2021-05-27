<button  class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"  style="border-radius:15px ;"  type="button"><b>Agregar a biblioteca</b></button>
<ul class="dropdown-menu">
	@if($libraries->pluck('library')->contains(1))
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},1)"><box-icon name='check'></box-icon>Lista De Deseos</a></li>
	@else
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},1)">Lista De Deseos</a></li>
	@endif


	@if($libraries->pluck('library')->contains(2))
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},2)"><box-icon name='check'></box-icon>Leyendo</a></li>
	@else
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},2)">Leyendo</a></li>
	@endif


	@if($libraries->pluck('library')->contains(3))
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},3)"><box-icon name='check'></box-icon>Leido</a></li>
	@else
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},3)">Leido</a></li>
	@endif


	@if($libraries->pluck('library')->contains(4))
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},4)"><box-icon name='check'></box-icon>Favoritos</a></li>
	@else
	<li><a class="dropdown-item" href="#" onclick="storeInLibrary({{$book->id}},4)">Favoritos</a></li>
	@endif


	<li><hr class="dropdown-divider"></li>
	<li><a  class="dropdown-item text-muted" href="#">Biblioteca Personal</a></li>
</ul>
