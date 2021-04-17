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
				if(data[i].type==1 ){
				print += "<li><a href='#' class='dropdown-item'><img style='border-radius:2px' class='mx-2' width='35px' height='50px' src='http://localhost/LARAVEL/meetbook/public/books_image/"+ data[i].image +"'>" + data[i].name + "</a></li>";
				}

				if(data[i].type==2){
				print += "<li><a href='#' class='dropdown-item'>" + data[i].name + "</a></li>";
				}
				if(data[i].type==3){
				print += "<li><a href='#' class='dropdown-item'><img style='border-radius:360px' class='mx-2' width='35px' height='35px' src='http://localhost/LARAVEL/meetbook/public/users_image/"+ data[i].image +"'>" + data[i].name + "</a></li>";
				}
			}
			print += "</ul>";
			if($('#search').val()=='' || data.length ==0){
				document.getElementById('autocomplete').innerHTML='';	
			}else{
				document.getElementById('autocomplete').innerHTML = print;
			}
			console.log(data);
		})
	})
})
