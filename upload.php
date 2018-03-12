<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- 	Cropper, Bootstrap, SemanticUI Button and Icon, Custom CSS	-->
	<link href="assets/bower_components/cropper/dist/cropper.css" rel="stylesheet">
	<link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/bower_components/semantic-ui-button/button.min.css" rel="stylesheet" type="text/css">
	<link href="assets/bower_components/semantic-ui-icon/icon.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/upload.css" rel="stylesheet" type="text/css">

	<title>Upload Image</title>
</head>
<body>

	<div class="container-fluid">
		<p>
			<input type="file" name="file" id="file" class="btn btn-light">
			<button class="btn btn-secondary">Upload</button>
		</p>
	
		<!-- Crop Button and the Image to Crop -->
		<div id="picToCrop">
			<div id="thisImage">
				<!--	imgs/pics/sydney/syd_port3.jpg	-->
				<img id="imageToCrop" src="" class="img-responsive">
			</div>
			<p><button id="cropButton" class="btn btn-success">Crop</button></p>
		</div>
		
		<!-- 	Cropped Image, Description of Image and Submit to upload to database	-->
		<div id="main">
			<img src="" id="newImage" class="img-responsive img-thumbnail">
			<form action="#" method="POST" id="form">
				<label for="options">Location:</label>
				<select class="form-control" id="options">
					<option>Travel</option>
					<option>Food</option>
					<option>Random</option>
				</select>

				<label for="txtarea">Description:</label>
				<textarea name="description" form="form" class="form-control" id="txtarea"></textarea>

				<br>
				<button class="ui vertical animated button primary fluid">
					<div class="hidden content"><i class="upload icon"></i></div>
					<div class="visible content">Finish</div>
				</button>
			</form>
		</div>
	</div>
	
	<!-- JS Imports	-->
	<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/bower_components/cropper/dist/cropper.js"></script>
	<script type="text/javascript" src="assets/js/upload.js"></script>
</body>
</html>