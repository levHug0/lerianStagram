<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/lerianStagram/home.php";
include_once($path);

/*	When a user wants to register	*/
if(isset($_POST['register'])) {
	$fName = strip_tags($_POST['firstName']);		// removes html tags
	$fName = preg_replace('/\s+/', '', $fName);		// removes all white spaces
	$fName = ucfirst(strtolower($fName));			// turns first letter into Capital

	$lName = strip_tags($_POST['lastName']);
	$lName = preg_replace('/\s+/', '', $lName);
	$lName = ucfirst(strtolower($lName));

	$usr   = strip_tags($_POST['createUsername']);
	$usr   = preg_replace('/\s+/', '', $usr);
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
			array_push($err, "<br>You have successfully registered!");
		} else {
			array_push($err, "Passwords don't match!<br>");
		}
	}
}


/*	When a user is trying to log in */



function showModal($message, $status) {
	if ($status == "error") {
		// If it's an error then show error modal
		echo  	'<div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content ">
							<div class="modal-header bg-danger">
								<i class="ban icon big" style="color: white; margin: 0 auto"></i>
							</div>
							<div class="modal-body bg-light" style="text-align: center">'
								. $message .
							'</div>
							<div class="modal-footer bg-light">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>';

	} else if ($status == "success") {
		// else it's not an error, it's a registration successful
		echo 	'<div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content ">
							<div class="modal-header bg-primary">
								<i class="check icon big" style="color: white; margin: 0 auto"></i>
							</div>
							<div class="modal-body bg-light" style="text-align: center">
								Congratulations' . $message . 
							'</div>
							<div class="modal-footer bg-light">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>';
	}	
}

 ?>