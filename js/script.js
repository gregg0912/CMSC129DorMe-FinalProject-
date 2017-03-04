var counterFac = 1;
var counterRoom = 2;
var counterAdd = 1;
$(document).ready(function(){
	$(document).on("click", "#delete", delete_est);
	$(document).on("click", "#add-btn", add_op);
	$(document).on("click", "#add-btn2", add_room_op);
	$(document).on("click", "#add-btn3", add_on_op);
	$(document).on("click", ".remove", remove_op);
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
function add_op(e){
	e.preventDefault();
	var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counterFac);
	$.ajax({
		url:'add-est.php',
		type: "post",
		data: $(this).serialize(),
		success: function(data){
			console.log(data);
			newTextBoxDiv.after().html('<input type="text" name="facilityList[]" id="textbox' + counterFac + '" value="" placeholder="Type facility here" />'+
				'<input type="button" value="Remove" class="remove" />');
			newTextBoxDiv.appendTo("#checkboxEstGroup");
			counterFac++;
		}	

	});
}
function add_room_op(e){
	e.preventDefault();
	var newRoomdiv = $(document.createElement('div')).attr("id", 'roomDiv' + counterRoom);
	$.ajax({
		url: 'add-est.php',
		type: "post",
		data: $(this).serialize(),
		success: function(data){
			console.log(data);
			newRoomdiv.after().html('<label>Maximum number of residents: <input type="number" name="maxNum[]" min="1" value="1" /></label>'+
				'<label>'+
					'Type of Payment:'+
					'<select name="typeOfPayment[]" id="typeOfPayment">'+
						'<option value="by_room">Per Room</option>'+
						'<option value="by_person">Per person</option>'+
					'</select>'+
				'</label>'+
				'<label>Price: <input type="number" name="price[]" min="500" value="500" /></label>'+
				'<input type="button" value="Remove" class="remove" />');
			newRoomdiv.appendTo("#roomDiv1");
			counterRoom++;
		}
	});
}
function add_on_op(e){
	e.preventDefault();
	var newAddDiv = $(document.createElement('div')).attr("id", 'addDiv' + counterAdd);
	$.ajax({
		url: 'add-est.php',
		type: "post",
		data: $(this).serialize(),
		success: function(data){
			console.log(data);
			
		}
	});
}
function remove_op(e){
	console.log($(this).parent());
	$(this).parent().remove();
}