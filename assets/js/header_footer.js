/*	When the screen width reaches extra small width, then add the word 'Settings' before the cog icon	*/
var settings = document.querySelector("#settings");
var inner 	 = settings.innerHTML;
$(window).resize(function() {
	if ($(window).width() <= 750) {
		settings.innerHTML = "Settings" + inner;
	} else {
		settings.innerHTML = inner;
	}
});

window.onload = function () {
	if ($(window).width() <= 750) {
		settings.innerHTML = "Settings" + inner;
	}
}