$(document).ready(function(){
	$(document).on("click", ".like-post", likePost);
	$(document).on("click", ".btn-success", changeToUnfollow);
	$(document).on("click", ".btn-danger", changeToFollow);


});

// window.onload = function(){
// 	document.getElementById("follow").onclick = changeToUnfollow;
// }

function likePost(){
	var post_id = $(this).attr("data-pg");
	$.ajax({
		url: "/posts/like/"+post_id,
		type: "get",
		success:function(data){
			var like_count = data.length;

			$("#like-count-"+post_id).html(like_count+" likes");

			var likers = "";
			$.each(data, function(key, value){
				likers += "<div><a href='/profile/"+value['username']+"'>"+value['name']+"</a></div>";
			});
			$("#myModal_"+post_id+" .modal-body").html(likers);
		}
	});
}

function changeToUnfollow() {
	console.log("sulod");
	var followBtn = document.getElementById("follow");
	followBtn.className = "btn btn-danger";
	followBtn.innerHTML = "Unfollow";

}

function changeToFollow() {
	var followBtn = document.getElementById("follow");
	followBtn.className = "btn btn-success";
	followBtn.innerHTML = "Follow";

}