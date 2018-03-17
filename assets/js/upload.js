var val, source,
	show = { display: "inline-block"},
	hide = { display: "none"};

var	img 		= document.querySelector("#imageToCrop"),
	file 		= document.querySelector("#file"),
	ret 		= document.querySelector("#newImage"),
	cropperDiv	= document.querySelector("#picToCrop"),
	mainDiv		= document.querySelector("#main");

$(file).on("change", function() {
	$(img).cropper("destroy");
	val = this.value;
	val = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	source = window.URL.createObjectURL(this.files[0]);
});

/*	When the 'Upload' button is clicked	*/
$("#upload").on("click", function() {
	if (file.value.length == 0) {
		alert("File is empty!");

	} else {
		if (val == "png" || val == "jpg" || val == "jpeg" || val == "gif" || val == "tiff") {
			$(file).prop("disabled", true);
			$(ret).attr("src", ""); 

			img.src = source;
			$(cropperDiv).css(show);
			$(mainDiv).css(hide);

			$(img).cropper({
				aspectRatio: 4 / 3,
				zoomable: false,
				movable: false,
				responsive: true,
			});

		} else {
			val.value = "";
			img.src= "";
			alert("Incorrect file format\n\nMake sure to upload an Image!");
		}
	}
});

/***	For Cropping	***/
$("#cropButton").on("click", function() {
	var cropped = $('#imageToCrop').cropper('getCroppedCanvas', {
		width: 640,
		height: 480
	}).toDataURL("image/" + val);

	$(ret).attr("src", cropped); 

	// resets image source, hides the cropper and shows the new image plus form input
	img.src = "";
	$(cropperDiv).css(hide);
	$(mainDiv).css(show);

	//enables the file input
	$(file).prop("disabled", false);
});

/*	AJAX the data to the database	*/
$('#finish').on("click", function() {
	$(img).cropper('getCroppedCanvas', {width: 320, height: 240, checkOrientation: false}).toBlob(function (blob) {
		var formData = new FormData();
		formData.append('croppedImage', blob);
		formData.append('location', 	$('select').val());
		formData.append('description', 	$('textarea').val());
		formData.append('imageType', val);

		$.ajax('includes/backend_files/uploadBackend.php', {
			method: "POST",
			data: formData,
			processData: false,
	    	contentType: false,
			success: function() {
				alert("Upload Success");
				location.reload();
			},
			error: function() {
				alert("Upload error");
			}
		}); // Endof ajax
	}); // Endof cropper
}); // Endof Selector


// Goes back to previous page, but it reloads it
// document.referrer gets url of the previous location the user comes from
/*
$('#back').on("click", function() {
	location.replace(document.referrer);
});*/