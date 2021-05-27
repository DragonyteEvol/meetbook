function submitImage(id){
	name="image"+id;
	document.getElementById(name).style.display="";
}

function showFormEdit(){
	$.ajax({
		url: route('showFormEditUser'),
		method: "GET",
		data:{
		}
	}).done(function(data){
		document.getElementById('data1').innerHTML=data;
	})
}
