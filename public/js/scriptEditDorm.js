$(document).ready(function(){
	editRoomCount = $('input[name="maxNum[]"]').length;
	editFacilityCount = $('input[name="facilities[]"]').length;
	editAddonCount = $('input[name="add_item[]"]').length;
	$(document).on("click", "#edit-addFacility", addFacilityBox);
	$(document).on("click", "#edit-removeFacility", removeFacilityBox);
	$(document).on("click", "#edit-addRoom", addRoomBox);
	$(document).on("click", "#edit-removeRoom", removeRoomBox);
	$(document).on("click", "#edit-addAddon", addAddonBox);
	$(document).on("click", "#edit-removeAddon", removeAddonBox);
});

function addFacilityBox(e){
	e.preventDefault();
	if(editFacilityCount > 10){
		$("#facilityError").modal();
		return false;
	}
	var newFacilityDiv = $(document.createElement('div')).attr("id", 'facilityTextbox'+(editFacilityCount+1));
	newFacilityDiv.addClass("form-group");
	newFacilityDiv.after().html(
		'<div class="input-group">'+
			'<input type="text" name="facilities[]" class="form-control" placeholder="Facility Name" />'+
			'<span class="input-group-btn">'+
				'<button type="button" class="btn btn-danger" id="edit-removeFacility" >'+
					'<span class="glyphicon glyphicon-minus-sign"></span> Remove'+
				'</button>'+
			'</span>'+
		'</div>'
	);

	$('#edit-addFacility').before(newFacilityDiv);
	editFacilityCount = $('input[name="facilities[]"]').length;
}

function addRoomBox(e){
	e.preventDefault();
	if(editRoomCount > 10){
		$("#roomError").modal();
		return false;
	}
	var newRoomBox = $(document.createElement('div')).attr("id", 'roomDiv'+(editRoomCount+1));
	newRoomBox.addClass("form-group");
	newRoomBox.after().html(
		'<div class="input-group">'+
			'<div class="col-xs-3">'+
				'<label>Max residents: <input type="number" class="form-control" name="maxNum[]" min="1" value="1"></label>'+
			'</div>'+
			'<div class="col-xs-3">'+
				'<label>Type of Payment:'+ 
					'<select name="typeOfPayment[]" class="form-control">'+
						'<option value="by_room">Per room</option>'+
						'<option value="by_person">Per person</option>'+
					'</select>'+
				'</label>'+
			'</div>'+
			'<div class="col-xs-3">'+
				'<label>Price: <input type="number" class="form-control" name="price[]" min="500" value="500" /></label>'+
			'</div>'+
			'<div class="col-xs-3">'+
				'<button type="button" class="btn btn-danger" id="edit-removeRoom"><span class="glyphicon glyphicon-minus-sign"></span> Remove</button>'+
			'</div>'+
		'</div>'
	);
	$("#edit-addRoom").before(newRoomBox);
	editRoomCount = $('input[name="maxNum[]"]').length;
}

function addAddonBox(e){
	e.preventDefault();
	if(editAddonCount > 10){
		$("#addonError").modal();
		return false;
	}
	var newAddonBox = $(document.createElement('div')).attr("id", 'addonDiv'+(editAddonCount+1));
	newAddonBox.addClass("form-group");
	newAddonBox.after().html(
		'<div class="input-group">'+
			'<input type="text" class="form-control" name="add_item[]" placeholder="Addon name" />'+
			'<div class="input-group-addon">'+
				'<span class="glyphicon glyphicon-rub"></span>'+
			'</div>'+
			'<input type="number" class="form-control" name="add_price[]" min="100" />'+
			'<div class="input-group-btn">'+
				'<button type="button" class="btn btn-danger" id="edit-removeAddon"><span class="glyphicon glyphicon-minus-sign"></span> Remove</button>'+
			'</div>'+
		'</div>'
	);
	$("#edit-addAddon").before(newAddonBox);
	editAddonCount = $('input[name="add_item[]"]').length;
}

function removeFacilityBox(e){
	e.preventDefault();
	if(editFacilityCount == 1){
		$("#facilityRemoveError").modal();
		return false;
	}
	$(this).closest('[id^="facilityTextbox"]').remove();
	editFacilityCount = $('input[name="facilities[]"]').length;
}

function removeAddonBox(e){
	e.preventDefault();
	$(this).closest('[id^="addonDiv"]').remove();
	editAddonCount = $('input[name="add_item[]"]').length;
}

function removeRoomBox(e){
	e.preventDefault();
	if(editRoomCount == 1){
		$("#roomRemoveError").modal();
		return false;
	}
	$(this).closest('[id^="roomDiv"]').remove();
	editRoomCount = $('input[name="maxNum[]"]').length;
}