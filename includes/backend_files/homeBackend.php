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
	$date  = date('Y-m-d h:i:s');

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
		//	$query = $conn->prepare("INSERT INTO users VALUES ('', :usr, :pass, :fName, :lName )");
		//	$query->execute(array(":usr"=>$usr, ":pass"=>$pass, ":fName"=>$fName, ":lName"=>$lName));
			$query = $conn->prepare("INSERT INTO users VALUES ('', :fName, :lName, :usr, :pass, :joined)");
			$query->execute(array(
				":fName" => $fName, 
				":lName" => $lName, 
				":usr" => $usr,
				":pass" => $pass, 
				":joined" => $date)
			);
			array_push($err, "<br>You have successfully registered!");
		} else {
			array_push($err, "Passwords don't match!<br>");
		}
	}

/*	When a user wants to login	*/
} else if (isset($_POST['login'])) {
	$usr 		= strip_tags($_POST['username']);
	$usr 		= preg_replace('/\s+/', '', $usr);
	$pass 		= strip_tags($_POST['password']);
	$pass 		= preg_replace('/\s+/', '', $pass);
	$err 		= array();

	$query = $conn->prepare("SELECT * FROM users WHERE BINARY username=:usr");
	$query->execute(array(":usr" => $usr));
	$rowCount = $query->rowCount();
	
	// $rowCount > 0 means it found a user
	if ($rowCount == 1) {
		$row 	= $query->fetch(PDO::FETCH_ASSOC);

		$id 		= $row['id'];
		$username 	= $row['username'];
		$fName 		= $row['first_name'];
		$lName  	= $row['last_name'];
		$password 	= $row['password'];

		if (password_verify($pass, $password)) {
			$_SESSION['id'] 			= $row['id'];
			$_SESSION['username']		= $row['username'];
			$_SESSION['userLoggedIn'] 	= $row['first_name'] . " " . $row['last_name'];

			header("location: lerianstagram");
			exit;

		} else {
			array_push($err, "The password that you've entered is incorrect.<br>");
		}

	} else {
		array_push($err, "Sorry that Username is not registered<br><br>** Note: Usernames are Case-sensitive **");
	}
}

// Function to show the modal
function showModal($message, $status) {
	// 0 = error, 1 = success
	if ($status == 0) {
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

	} else if ($status == 1) {
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