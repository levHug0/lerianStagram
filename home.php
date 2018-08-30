<?php 
	include 'includes/pdoConnection.php';
	include 'includes/backend_files/homeBackend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--	Google Font(Lato), BOOTSTRAP, SemanticUI Button, CUSTOM CSS	-->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i" rel="stylesheet">
    <link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bower_components/semantic-ui-button/button.min.css" rel="stylesheet" type="text/css">
    <link href="assets/bower_components/semantic-ui-icon/icon.min.css" rel="stylesheet" type="text/css">
    <link href="assets/bower_components/semantic-ui-label/label.min.css" rel="stylesheet" type="text/css" >
    <link href="assets/css/home.css" rel="stylesheet" type="text/css" >

	<title>Home | To Infinity and Beyond || LerianStagram</title>
</head>
<body>
	<?php 
		// If is for showing error/success messages to the user when they register
		// else if is for showing error messages to the user when they login
		if (isset($_POST['register'])) {
			echo '<script type="text/javascript">
					window.onload = function() {
						$(".login").hide();
						$(".registerForm").show();
					}
				</script>';

			// Check form for error = 0, if no errors show a registration success = 1
			if (in_array("Incorrect Email format!<br>", $err)) {
				showModal("Incorrect Email format!<br>", 0);

			} else if (in_array("Sorry that email is taken<br>", $err)) {
				showModal("Sorry that email is taken<br>", 0);

			} else if (in_array("Passwords don't match!<br>", $err)) {
				showModal("Passwords don't match!<br>", 0);

			} else if (in_array("<br>You have successfully registered!", $err)) {
				echo '		<script type="text/javascript">
								window.onload = function() {
									$(".login").show();
									$(".registerForm").hide();
								}
							</script>';
				showModal("<br>You have successfully registered!", 1);
			}

		} else if (isset($_POST['login'])) {

			if (in_array("Entered Password is incorrect.<br>", $err)) {
				showModal("Entered Password is incorrect.<br>", 0);

			} else if (in_array("Sorry that email is not registered<br>", $err)) {
				showModal("Sorry that email is not registered<br>", 0);
			}
		}
	?>
	<div class="container">
			<img src="assets/imgs/logo3.jpg" class="img-fluid mx-auto d-block" alt="Logo">
			
			<!--	Div to register	-->
			<div class="registerForm">
				<form action="home" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="firstName">First Name:</label>
							<input class="form-control" type="text" name="firstName" id="firstName" placeholder="First Name">
							<div class="ui pointing red basic label" id="errorFirstName"></div>
						</div>

						<div class="form-group col-12 col-md-6">
							<label for="lastName">Last Name:</label>
							<input class="form-control" type="text" name="lastName" id="lastName" placeholder="Last Name">
							<div class="ui pointing red basic label" id="errorLastName"></div>
						</div>
					</div>

					<div class="form-row register">
						<div class="form-group col-12">
							<label for="createEmail">Email:</label>
							<input class="form-control" type="text" name="createEmail" id="createEmail" placeholder="Email">
							<div class="ui pointing red basic label" id="errorEmail"></div>
						</div>
					</div>

					<div class="form-row register">
						<div class="form-group col-12">
							<label for="createPass">Password:</label>
							<input class="form-control" type="password" name="createPass" id="createPass" placeholder="Must be at least 6 characters long" maxlength="30">
							<div class="ui pointing red basic label" id="errorCreatePass"></div>
						</div>
					</div>

					<div class="form-row register">
						<div class="form-group col-12">
							<label for="confirmPass">Confirm Password:</label>
							<input class="form-control" type="password" name="confirmPass" id="confirmPass" placeholder="Confirm Password" maxlength="30">
							<div class="ui pointing red basic label" id="errorConfirmPass"></div>
						</div>
					</div>

					<div class="register">
						<button type="submit" name="register" class="ui primary button fluid medium">REGISTER</button>
					</div>
				</form>
			</div>

			<!--	Div to login	-->
			<div class="login">
				<form action="home" method="POST" enctype="multipart/form-data" onsubmit="return loginValidate()">
					<div class="form-group">
						<label for="email">Email:</label>
	   					 <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email">
	   					 <div class="ui pointing red basic label" id="loginEmailError"></div>
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" maxlength="30">
						<div class="ui pointing red basic label" id="loginPasswordError"></div>
					</div>

					<button type="submit" name="login" class="ui vertical animated button primary fluid">
						<div class="hidden content">Welcome&nbsp;&nbsp;<i class="smile icon"></i></div>
						<div class="visible content">LOGIN</div>
					</button>
				</form>
			</div>
			
			<!--	Bottom of the container -->
			<hr>
			<p class="login">Don't have an account?&nbsp;&nbsp;<span><strong><em>Register</em></strong></span></p>
			<p class="registerForm">Already have an account?&nbsp;&nbsp;<span><strong><em>Sign In</em></strong></span></p>
	</div>
	<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/home.js"></script>
</body>
</html>