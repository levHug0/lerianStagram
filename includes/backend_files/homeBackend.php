<?php 
	
	/*	When a user wants to register	*/
	if(isset($_POST['register'])) {
		$fName = strip_tags($_POST['firstName']);
		$fName = ucfirst(strtolower($fName));	// turns first letter into Capital

		$lName = strip_tags($_POST['lastName']);
		$lName = ucfirst(strtolower($lName));

		$usr   = strip_tags($_POST['createUsername']);
		$err   = array();

		$pass  = strip_tags($_POST['createPass']);
		$pass2 = strip_tags($_POST['confirmPass']);

		// If username is already registered, don't add user.
		// If not, check if both password match, then create the user
		$query = $conn->prepare("SELECT * FROM users WHERE username = ?");
		$query->execute(array($usr));
		$rowCount = $query->rowCount();

		if ($rowCount >= 1) {
			array_push($err, "Sorry that Username is taken<br>");

		} else {

			// Check if passwords match, then create the user
			if ($pass == $pass2) {
				$pass = password_hash($pass, PASSWORD_DEFAULT);
				$query = $conn->prepare("INSERT INTO users VALUES ('', :usr, :pass, :fName, :lName )");
				$query->execute(array(":usr"=>$usr, ":pass"=>$pass, ":fName"=>$fName, ":lName"=>$lName));
				array_push($err, "Registered Successfully!");
			} else {
				array_push($err, "Passwords don't match!<br>");
			}
		}
	}


	/*	When a user is trying to log in */
	
 ?>