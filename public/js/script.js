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
	$(this).closest('[id^="addonDiv"]').remove();
}

function addAddon(e){
	e.preventDefault();
	if(addonCount > 10){
		$("#addAddonModal").modal();
		return false;
	}
	var newAddonDiv = $(document.createElement('div')).attr("id", 'addonDiv'+addonCount);
	newAddonDiv.addClass("form-group");
	newAddonDiv.after().html(
		'<div class="input-group">'+
			'<input type="text" name="add_item[]" class="form-control" placeholder="Addon name" />'+
			'<div class="input-group-addon">'+
				'<span class="glyphicon glyphicon-rub"></span>'+
			'</div>'+
			'<input type="number" name="add_price[]" class="form-control" min="100" value="100" />'+
			'<div class="input-group-btn">'+
				'<button type="button" class="btn btn-danger" id="removeAddon"><span class="glyphicon glyphicon-minus-sign"></span> Remove</button>'+
			'</div>'+
		'</div>'
		);
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
	newRoomDiv.after().html(
		'<div class="input-group">'+
			'<div class="col-xs-3">'+
				'<label>Max residents: <input type="number" class="form-control" name="maxNum[]" min="1" value="1" /></label>'+
			'</div>'+
			'<div class="col-xs-3">'+
				'<label>Type of Payment:'+
					'<select name="typeOfPayment[]" class="form-control">'+
						'<option value="by_room">Per Room</option>'+
						'<option value="by_person">Per person</option>'+
					'</select>'+
				'</label>'+
			'</div>'+
			'<div class="col-xs-3">'+
				'<label>Price: <input type="number" name="price[]" min="500" value="500" class="form-control" /></label>'+
			'</div>'+
			'<div class="col-xs-3">'+
				'<span style="visibility:hidden;">Remove</span>'+
				'<button type="button" class="btn btn-danger" id="removeRoom">'+
					'<span class="glyphicon glyphicon-minus-sign"></span> Remove'+
				'</button>'+
			'</div>'+
		'</div>'
	);
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
	$(this).closest('[id^="roomDiv"]').remove();
}

function addFacility(e){
	e.preventDefault();
	if(facilityCount > 10){
		$("#addFacilityModal").modal();
		return false;
	}
	var newFacilityTextbox = $(document.createElement('div')).attr("id", 'facilityTextbox' + facilityCount);
	newFacilityTextbox.addClass("form-group");
	newFacilityTextbox.after().html(
		'<div class="input-group">'+
			'<input type="text" name="facilities[]" class="form-control" placeholder="Facility Name" />'+
			'<span class="input-group-btn">'+
				'<button type="button" class="btn btn-danger" id="removeFacility" >'+
					'<span class="glyphicon glyphicon-minus-sign"></span> Remove'+
				'</button>'+
			'</span>'+
		'</div>');
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
	$(this).closest('[id^="facilityTextbox"]').remove();
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