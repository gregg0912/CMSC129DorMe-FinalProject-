facilityCount = 2;
roomCount = 2;
addonCount = 2;

$(document).ready(function(){

	$(document).on("submit", "#voteForm", vote);
	$(document).on("click", "#add-facility", addFacility);
	$(document).on("click", "#removeFacility", removeFacility);
	$(document).on("click", "#add-room", addRoom);
	$(document).on("click", "#removeRoom", removeRoom);
	$(document).on("click", "#add-addon", addAddon);
	$(document).on("click", "#removeAddon", removeAddon);

});

function removeAddon(e){
	e.preventDefault();
	addonCount--;
	$(this).closest('div').remove();
}

function addAddon(e){
	e.preventDefault();
	if(addonCount > 10){
		$("#addAddonModal").modal();
		return false;
	}
	var newAddonDiv = $(document.createElement('div')).attr("id", 'addonDiv'+addonCount);
	newAddonDiv.after().html('<input type="text" class="form-control" name="add_item[]" placeholder="Addon Name"/>'+
		' - <input name="add_price[]" type="number" min = "100" value="100"/>'+
		'<button type="button" class="btn btn-danger" id="removeAddon">'+
			'<span class="glyphicon glyphicon-minus-sign"></span> Remove'+
		'</button>');
	// newAddonDiv.appendTo("#addonDiv1");
	$("#add-addon").before(newAddonDiv);
	addonCount++;
}

function addRoom(e){
	e.preventDefault();
	if(roomCount > 10){
		$("#addRoomModal").modal();
		return false;
	}
	var newRoomDiv = $(document.createElement('div')).attr("id", 'roomDiv'+roomCount);
	newRoomDiv.after().html('<div class="input-gorup {{ $errors->has(\'maxNum[]\') ? \'has-error\': \'\' }}">'+
							'<label>Maximum number of residents: <input type="number" class="form-control" name="maxNum[]" min="1" value="1" /></label>'+
						'</div>'+
						'<div class="input-group {{ $errors->has(\'typeOfPayment[]\') ? \'has-error\': \'\' }}">'+
							'<label>'+
								'Type of Payment:'+
								'<select name="typeOfPayment[]">'+
									'<option value="by_room">Per Room</option>'+
									'<option value="by_person">Per person</option>'+
								'</select>'+
							'</label>'+
						'</div>'+
						'<div class="input-group {{ $errors->has(\'price[]\') ? \'has-error\': \'\' }}">'+
							'<label>Price: <input type="number" class="form-control" name="price[]" min="500" value="500" /></label>'+
						'</div>'+
						'<button type="button" class="btn btn-danger" id="removeRoom">'+
							'<span class="glyphicon glyphicon-minus-sign"></span> Remove'+
						'</button>');
	// newRoomDiv.appendTo("#RoomsGroup");
	$("#add-room").before(newRoomDiv);

	roomCount++;
}

function removeRoom(e){
	e.preventDefault();
	if(roomCount == 1){
		alert("No more rooms to remove!");
		return false;
	}

	roomCount--;
	$(this).closest('div').remove();
}

function addFacility(e){
	e.preventDefault();
	if(facilityCount > 10){
		$("#addFacilityModal").modal();
		return false;
	}
	var newFacilityTextbox = $(document.createElement('div')).attr("id", 'facilityTextbox' + facilityCount);
	newFacilityTextbox.after().html('<input type="text" class="form-control" name="facilities[]" id="facility'+facilityCount+'" placeholder="Facility Name" />'+
		'<button type="button" class="btn btn-danger" id="removeFacility">'+
			'<span class="glyphicon glyphicon-minus-sign"></span> Remove'+
		'</button>');
	newFacilityTextbox.appendTo("#FacilitiesGroup");

	facilityCount++;
}

function removeFacility(e){
	e.preventDefault();
	if(facilityCount == 1){
		alert("No more textboxes to remove!");
		return false;
	}
	facilityCount--;
	$(this).closest('div').remove();
}

function vote(e){
	e.preventDefault();
	if($('input:radio[name=establishment]',this).is(':checked')){
		var dorm_id = $('input:radio[name=establishment]:checked').val();
		$.ajax({
			url: "/voteDorm/"+dorm_id,
			type: "get",
			success:function(data){
				var establishments = "";
				$.each(data, function(key,value){
					establishments +=
						("<div>"+
							"<label><span class='badge'>"+value['votes']+"</span>"+value['dormName']+"</label>"+
						"</div>");
				});
				$(".poll-list").html(establishments);
				$("#successModal").modal();
			}
		});
	}else{
		$("#errorModal").modal();
		return false;
	}
}

function mulpics(e) {	
	var form = document.getElementById("pictures");
	var request = new XMLHttpRequest();
	e.preventDefault();
	var formData =  new FormData(form);

	request.open('POST', '/upload/{{$dorm->id}}');
	request.addEventListener('load', transferComplete);
	request.send(formData); 
}

function transferComplete(data) {
	response = JSON.parse(data.currentTarget.response);
	console.log(response);
	if (response.success) {
		document.getElementById("msg").innerHTML = "Successfullly uploaded pictures";
	}
}