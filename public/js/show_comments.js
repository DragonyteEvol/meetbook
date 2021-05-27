function showComments(id){
	$.ajax({
		url: route('showCommentsUser'),
		method: "GET",
		data:{
			_token : $("input[name='_token']").val(),
			id_post: id,
		}
	}).done(function(dataJson){
		data=JSON.parse(dataJson);
		console.log(data);
		if(data.length==0){
		print="<hr>";
		}else{
		print="<a href='"+route('showPostUser',id)+"'>Ver todos</a>";
		}
		for(var i =0;i<data.length;i++){
			print+="<div style='border-bottom:2px solid #f2f2f2' class='row justify-content-between my-1'>";
			print+="<div class='col-2'><img src='"+asset_user_global+"/"+data[i].image+"' width='80%' height='45px' style='border-radius:100%'>"+
				"<span>"+data[i].created_at+"<span>"
				+"</div>";
			print+="<div class='col-9'><h4 style='font-size:small'><b>"+data[i].name+"</b></h4><span class='align-middle'>"+data[i].description+"</span></div>";
			print+="</div>";
		}
		id_comment="comment"+id;
		document.getElementById(id_comment).style.display="";
		document.getElementById(id).innerHTML=print;
	})
}

function likePost(id){
	$.ajax({
		url: route('likePostUser'),
		method: "GET",
		data:{
			post_id:id,
		}
	}).done(function(dataJson){
		data=JSON.parse(dataJson);
		id_link_like="linklike"+id;
		id_link_dislike="linkdislike"+id;
		if(data==false){
		document.getElementById(id_link_like).className="link-dark";
		}else{
		document.getElementById(id_link_like).className="link-primary";
		document.getElementById(id_link_dislike).className="link-dark";
		}	
	})
}

function dislikePost(id){
	$.ajax({
		url: route('dislikePostUser'),
		method: "GET",
		data:{
			post_id:id,
		}
	}).done(function(dataJson){
		data=JSON.parse(dataJson);
		id_link_dislike="linkdislike"+id;
		id_link_like="linklike"+id;
		if(data==false){
		document.getElementById(id_link_dislike).className="link-dark";
		}else{
		document.getElementById(id_link_dislike).className="link-primary";
		document.getElementById(id_link_like).className="link-dark";
		}	
		console.log(data);
	})
}
