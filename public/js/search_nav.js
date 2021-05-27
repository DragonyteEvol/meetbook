$(document).ready(function(){
	$('#search').keyup(function(){
		$.ajax({
			url : route('searchBookProfileAutocomplete'),
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
				print += "<li style='border-radius: 5px;border: solid 2px #f2f2f2;font-size: small'><a href='http://localhost/LARAVEL/meetbook/public/book/show/"+data[i].id+"' class='dropdown-item my-1'><img style='border-radius:2px' class='mx-2' width='35px' height='50px' src='http://localhost/LARAVEL/meetbook/public/books_image/"+ data[i].image +"'>" + data[i].name + "</a></li>";
				}

				if(data[i].type==2){
				print += "<li style='border-radius: 5px;border: solid 2px #f2f2f2;font-size: small'><a href='http://localhost/LARAVEL/meetbook/public/author/show/"+data[i].id+"' class='dropdown-item my-1'>" + data[i].name + "</a></li>";
				}
				if(data[i].type==3){
				print += "<li style='border-radius: 5px;border: solid 2px #f2f2f2;font-size: small'><a href='http://localhost/LARAVEL/meetbook/public/user/show/"+data[i].id+"' class='dropdown-item my-1'><img style='border-radius:360px' class='mx-2' width='35px' height='35px' src='http://localhost/LARAVEL/meetbook/public/users_image/"+ data[i].image +"'>" + data[i].name + "</a></li>";
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
