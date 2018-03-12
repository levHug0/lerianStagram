var val, source;

var show = { display: "inline-block"},
	hide = { display: "none"};

var	img 		= document.querySelector("#imageToCrop"),
	file 		= document.querySelector("#file"),
	ret 		= document.querySelector("#newImage"),
	cropperDiv	= document.querySelector("#picToCrop"),
	mainDiv		= document.querySelector("#main");

$(file).on("change", function() {
	val = this.value;
	val = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	source = window.URL.createObjectURL(this.files[0]);
});

/*	When the 'Upload' button is clicked	*/
$("button:nth-of-type(1)").on("click", function() {
	if (file.value.length == 0) {
		alert("File is empty!");

	} else {
		$(file).prop("disabled", true);
		$(ret).attr("src", ""); 

		if (val == "png" || val == "jpg" || val == "jpeg" || val == "gif" || val == "tiff") {
			img.src = source;
			$(cropperDiv).css(show);
			$(mainDiv).css(hide);

			$(img).cropper({
				aspectRatio: 4 / 3,
				zoomable: false,
				movable: false,
				responsive: true,
				//minCropBoxWidth: 640,
				//minCropBoxHeight: 480,
				//cropBoxResizable: false 
			});

		} else {
			val.value = "";
			img.src= "";

			// Show error
		}
	}
});

/***	For Cropping	***/
$("#cropButton").on("click", function() {
	var cropped = $('#imageToCrop').cropper('getCroppedCanvas', {
		maxWidth: 800, 
		maxHeight: 600
	}).toDataURL("image/png");

	$(ret).attr("src", cropped); 

	// resets image source, hides the cropper and shows the new image plus form input
	img.src = "";
	$(cropperDiv).css(hide);
	$(mainDiv).css(show);

	// Destroys the cropper and enables the file input
	$(img).cropper("destroy");
	$(file).prop("disabled", false);
});