$(document).ready(function(){
	$('#search').keyup(function(){
		$.ajax({
			url : "http://localhost/LARAVEL/meetbook/public/search/books/profiles/autocomplete",
			method : "GET",
			data:{
				_token : $("input[name='_token']").val(),
				text : $('#search').val()
			}
		}).done(function(dataJson){
			var data = JSON.parse(dataJson);
			var print = "<ul class='dropdown-menu' style='display:block;position:relative'>";
			for(var i =0;i<data.length;i++){
				print += "<li><a href='#' class='dropdown-item'>" + data[i].name + "</a></li>";
			}
			print += "</ul>";
			if($('#search').val()=='' || data.length ==0){
				document.getElementById('autocomplete').innerHTML='';	
			}else{
				document.getElementById('autocomplete').innerHTML = print;
			}
		})
	})
})
