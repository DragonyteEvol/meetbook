function storeInLibrary(id,library){
	$(document).ready(function(){
		$.ajax({
			method: "POST",
			url: route('storeItemLibraryUser'),
			data:{
				_token : $("input[name='_token']").val(),
				library: library,
				book_id: id
			}
		}).done(function(dataJson){
			console.log(dataJson);
		})
	})
}
