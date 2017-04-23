var counter = 1;
$(document).ready(function(){
	$(document).on("click", "#delete", delete_est);
	$(document).on("click", "#add-btn", add_op);
	$(document).on("click", "#uploadpic", upload);

});

function upload(e){
	e.preventDefault();
	$.ajax({
		url: 'uploadpics.php',
		type: "post",
		data: $(this).serialize(),
		success: $(function(data){
			console.log(data);
			$("#slider").html(data);
		});
	});

}

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

function add_op(e){
	e.preventDefault();
	// if(counter>10){
 //            alert("Only 10 textboxes allow");
 //            return false;
	// }

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);


    
	$.ajax({
		url:'add-est.php',
		type: "post",
		data: $(this).serialize(),
		success: function(data){
			console.log(data);
			newTextBoxDiv.after().html('<label>Facility ' + counter +  ': </label>' +
	      '<input type="text" name="textbox' + counter +
	      '" id="textbox' + counter + '" value="" >');

			newTextBoxDiv.appendTo("#TextBoxesGroup");
			counter++;
		}	

	});
}