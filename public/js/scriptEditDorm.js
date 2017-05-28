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
	if(editAddonCount > 10){
		$("#addonError").modal();
		return false;
	}
	var newRoomBox = $(document.createElement('div'))
}

function addAddonBox(e){
	alert('clicked add addon');
	console.log(editAddonCount);
}

function removeFacilityBox(e){
	alert('clicked remove facility');
}

function removeAddonBox(e){
	alert('clicked remove addon');
}

function removeRoomBox(e){
	alert('clicked remove room');
}