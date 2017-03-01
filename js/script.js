$(document).ready(function(){
	$(document).on("click", "#delete", delete_est);

});

function delete_est(e){
	e.preventDefault();
	var del = $(this).attr("data-pg");
	$.ajax({
		url:'delete-est.php',
		type: "post",
		data: {'row': del},
		success: function(data){
			console.log(data);
			$("#estab-list").html(data);
		}	
	});
}