$(document).ready(function(){
	$(document).on("click", ".prev", plusSlides);
	$(document).on("click", ".next", plusSlides);
});
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