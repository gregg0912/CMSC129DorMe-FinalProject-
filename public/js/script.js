$(document).ready(function(){
	$(document).on("submit", "#voteForm", vote);
	$(document).on("submit", "#uploadMulPics", mulpics);
	
});

function vote(e){
	e.preventDefault();
	if($('input:radio[name=establishment]',this).is(':checked')){
		var dorm_id = $('input:radio[name=establishment]:checked').val();
		$.ajax({
			url: "/voteDorm/"+dorm_id,
			type: "get",
			success:function(data){

				$.each(data, function(key,value){
					establishments += "<div class='radio'><label><span class='badge'>"+value['votes']+"</span>"+value['dormName']+"</label></div>";
				});
				$(".establishments-holder").html(establishments);
				$("#successModal").modal();
			}
		});
	}else{
		$("#errorModal").modal();
		return false;
	}
}

function mulpics(e) {
	e.preventDefault();
	var form =  new FormData(form);

	request.open('POST', '/upload/{{$dorm->id}}');
	request.addEventListener('load', transferComplete);
	request.send(form); 
}

function transferComplete(data) {
	response = JSON.parse(data.currentTarget.response);
	if (response.success) {
		document.getElementById("msg").innerHTML = "Successfullly uploaded pictures";
	}
}