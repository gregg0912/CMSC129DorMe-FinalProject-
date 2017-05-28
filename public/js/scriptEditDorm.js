editRoomCount = 2;
editFacilityCount = 2;
editAddonCount = 2;
$(document).ready(function(){
	$(document).on("click", "#edit-addFacility", addFacilityBox);
	$(document).on("click", "#edit-removeFacility", removeFacilityBox);
	$(document).on("click", "#edit-addRoom", addRoomBox);
	$(document).on("click", "#edit-removeRoom", removeRoomBox);
	$(document).on("click", "#edit-addAddon", addAddonBox);
	$(document).on("click", "#edit-removeAddon", removeAddonBox);
});

function addFacilityBox(e){
	alert('clicked add facility');
}

function addRoomBox(e){
	alert('clicked add room');
}

function addAddonBox(e){
	alert('clicked add addon');
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