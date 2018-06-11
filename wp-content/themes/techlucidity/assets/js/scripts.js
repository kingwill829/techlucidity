$(document).ready(function(){

//Activate mobile nav
$('.mobile-masthead__nav-icon').click(function() {
	$(this).toggleClass('mobile-masthead__nav-icon--active');

	$('.masthead__nav').slideToggle();
})

// Remove nav style attr on window resize
$(window).resize(function (){
	if($(window).width() > 991) {
	$('.masthead__nav').removeAttr('style');
	}
});



});


