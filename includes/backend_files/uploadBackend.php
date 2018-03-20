<?php 
	require '../pdoConnection.php';

	$location 		= $_POST['location'];									// Travel, Food, Random
	$description 	= strip_tags($_POST['description']);					// Message
	$type			= $_POST['imageType'];									// .jpg, .png, etc.
	$date			= date('Y-m-d h:i:s');									// looks something like 2018-03-17 08:02:59
	/*
		$currentDateTime = '08/04/2010 22:15:00';
		$newDateTime = date('h:i A', strtotime($currentDateTime));			'10.15 PM'
	*/

	$uniqueName		= uniqid('', true) . "." . $type;						// creates a unique name for the picture
	$destination 	= "../../assets/imgs/pictures/" . $uniqueName;			// this saves the actual picture inside this directory
	$actual			= "assets/imgs/pictures/" . $uniqueName;				// directory to save in the database for use
	move_uploaded_file($_FILES['croppedImage']['tmp_name'], $destination); 	// uploads image into folder

	/*	This will need to be changed	*/
	$query = $conn->prepare("INSERT INTO " . $location . " VALUES ('', :loc, :dec, :posted, :usr)");
	$query->execute(array(
		":loc" => $actual, 
		":dec" => $description, 
		":posted" => $date,
		":usr" => $_SESSION['id'])
	);