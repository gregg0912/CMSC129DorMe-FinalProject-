// $(document).ready(function(){
// 	$(document).on("submit", "#voteForm", vote);
// });

// function vote(){
// 	e.preventDefault();
// 	if($('input:radio[name=establishment]',this).is(':checked')){
// 		var dorm_id = $('input:radio[name=establishment]:checked').val();
// 		$.ajax({
// 			url: "/dorm/vote/"+dorm_id,
// 			type: "post",
// 			success:function(data){
// 				alert("You are here!");
// 				var establishments = "";
// 				$.each(data, function(key,value){
// 					establishments += "<div class='radio'><label><span class='badge'>"+value['votes']+"</span>"+value['dormName']+"</label></div>";
// 				});
// 				$(".establishments-holder").html(establishments);
// 				$("#successModal").modal();
// 			}
// 		});
// 	}else{
// 		$("#errorModal").modal();
// 		return false;
// 	}
// }