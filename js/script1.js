$(document).ready(function(){
	$(document).on("click", ".prev", plusSlides);
	$(document).on("click", ".next", plusSlides);
	$(document).on("click", "#delete", deleteDorm);
});

window.onload = function(){
	// function display() {
	var dorm = document.getElementsByClassName("establishment row");

	for (var i = dorm.length - 2; i >= 3; i--) {
		dorm[i].className += " center";
		console.log(dorm[i].innerHTML);
	}
	for (var i = dorm.length - 1; i >= 4; i--) {
		dorm[i].className += " center1";
		console.log(dorm[i].innerHTML);
	}

     $(window).scroll(function () {
     	// alert("alert");
     	console.log("scroll");
		// $('#back-to-top').tooltip({display: "show"});
		$('.to-top').css("display","block");
            if ($(this).scrollTop() > 10) {
                $('#back-to-top').fadeIn();

            } else {
                $('#back-to-top').fadeOut();
            }
        });
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

// }
}

function deleteDorm(id) {

	echo id;

	$.ajax({
		url: '/home/show/' + id,
		data: { "_token": "{{ csrf_token() }}" },
		type: 'DELETE',
		success: function(deleting){
			// return Redirect::back();

			echo "fjdksf";
		}


	});
}

var slideIndex = 1;
showSlides(slideIndex);

function showSlides(n){
	var i;
	var slides = $(document).getElementByClassName("estab");
	var dots = $(document).getElementByClassName("dot");
	if(n > slides.length){
		slideIndex = 1;
	}
	if(n < 1){
		slideIndex = slides.length;
	}
	for(i = 0 ; i < slides.length ; i++){
		slides[i].style.display = "none";
	}
	for(i = 0 ; i < dots.length ; i++){
		dots[i].className = dots[i].className.replace(" active","");
	}
	slides[slideIndex-1].style.display = "block";
	dots[slideIndex-1].className += " active";
}


// $(document).ready(function(){
//      $(window).scroll(function () {
//      	alert("alert");
//      	console.log("scroll");
// 		// $('#back-to-top').tooltip({display: "show"});
// 		$('.to-top').css("display","block");
//             if ($(this).scrollTop() > 10) {
//                 $('#back-to-top').fadeIn();

//             } else {
//                 $('#back-to-top').fadeOut();
//             }
//         });
//         $('#back-to-top').click(function () {
//             $('#back-to-top').tooltip('hide');
//             $('body,html').animate({
//                 scrollTop: 0
//             }, 800);
//             return false;
//         });

//         // var show = $('#back-to-top').tooltip
        

// });