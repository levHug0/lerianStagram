$('button').on("click", function() {
	$(this).addClass("loading");
});

$('.container').on("click", "span", function() {
	$('.registerForm').slideToggle();
	$('.login').slideToggle();
	$('p:nth-of-type(1)').slideToggle();
	$('p:nth-of-type(2)').slideToggle();
});

/*	Form validation */
function validate() {
	return true;
}