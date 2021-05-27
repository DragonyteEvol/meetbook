$(document).ready(function(){
	$.ajax({
		url: route('getGenres'),
		method: "GET",
		data:{
		}
	}).done(function(genres){
		var genre=JSON.parse(genres);
		var print="<option selected>Selecciona un genero</option>"
		for(var i =0;i<genre.length;i++){
			print += "<option value='"+genre[i].genre+"'>"+genre[i].genre+"</option>";
		}
		document.getElementById("genres").innerHTML=print;
	})
})

