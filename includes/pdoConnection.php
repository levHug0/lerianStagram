<?php 
	ob_start();
	session_start();
	date_default_timezone_set('Australia/Brisbane');

	try {
    	$conn = new PDO("mysql:host=localhost;dbname=lerian",'root' , '');
  	  	// set the PDO error mode to exception
   		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
    }
 ?>