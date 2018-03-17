<?php 
	if (!isset($_SESSION['userLoggedIn'])) {
		header("location: home");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google font, Bootstrap CSS, Font Awesome, Custom CSS-->
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="assets/bower_components/semantic-ui-icon/icon.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">

	<title>LerianStagram</title>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light py-1">
		<div class="container">
		 	<a href="lerianstagram" class="navbar-brand">Lerianstagram</a>
		 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		   	 	<span class="navbar-toggler-icon"></span>
		 	</button>

			  <!--	Collapse Items	-->
			<div class="collapse navbar-collapse" id="nav">
			  	<ul class="navbar-nav mr-auto">
			  		<li class="nav-item"><a href="about" class="nav-link">About</a></li>
			  		<li class="nav-item"><a href="travel" class="nav-link">Travel&nbsp;&nbsp;<i class="fas fa-plane"></i></a></li>
			  		<li class="nav-item"><a href="food" class="nav-link">Food&nbsp;&nbsp;<i class="fas fa-utensils"></i></a></li>
			  		<li class="nav-item"><a href="random" class="nav-link">Random&nbsp;&nbsp;<i class="fas fa-book"></i></a></li>
			  	</ul>

			  	<ul class="navbar-nav ml-auto">
			  		<!-- Shown only on large devices	-->
			  		<span class="navbar-text d-none d-md-block"><?php echo $_SESSION['userLoggedIn']; ?></span>

			  		<!-- Dropdown -->
			  		<li class="dropdown">
				  		<a href="#" id="settings" class="nav-link" data-toggle="dropdown"><i class="cog icon"></i></a>

				  		<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="settings">
				  			<li><a href="upload" class="dropdown-item">Upload</a></li>
				  			<li><a href="#" class="dropdown-item">Another action</a></li>
				  			<li><a href="#" class="dropdown-item">Another action2</a></li>
				  			<li class="dropdown-divider"></li>
				  			<li><a class="dropdown-item" href="includes/logout">Log Out</a></li>
				  		</ul>
			  		</li>
			  	</ul>
			</div>
		</div>
	</nav>