<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/components/button.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
	<title>Home | To Infinity and Beyond || LerianStagram</title>
</head>
<body class="myBackground">

	<div class="container">
			<img src="imgs/logo3.jpg" class="img-responsive" alt="Responsive image">

			<!--	Form to register	-->
			<div class="registerForm">
				<form action="">
					<div class="form-row">
						<div class="form-group col-12 col-md-6">
							<label for="firstName">First Name:</label>
							<input class="form-control" type="text" name="firstName" id="firstName" placeholder="First Name">
						</div>

						<div class="form-group col-12 col-md-6">
							<label for="lastName">Last Name:</label>
							<input class="form-control" type="text" name="lastName" id="lastName" placeholder="Last Name">
						</div>
					</div>

					<div class="form-row register">
						<div class="form-group col-12">
							<label for="createUsername">User Name:</label>
							<input class="form-control" type="text" name="createUsername" id="createUsername" placeholder="User Name">
						</div>
					</div>

					<div class="form-row register">
						<div class="form-group col-12">
							<label for="createPass">Password:</label>
							<input class="form-control" type="password" name="createPass" id="createPass" placeholder="Must have at least 6 characters" minlength="6">
						</div>
					</div>

					<div class="register">
						<button class="ui primary button fluid big">REGISTER</button>
					</div>
				</form>
			</div>


			<!--	Form to login	-->
			<div class="login">
				<form>
					<div class="form-group">
						<label for="username">Username:</label>
	   					 <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username">
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>

					<button class="ui primary button fluid big">LOGIN</button>
				</form>
			</div>
			
			<!--	Bottom of the container -->
			<hr>
			<p style="text-align: center">Don't have an account?&nbsp;&nbsp;<span><strong><em>Register</em></strong></span></p>
			<p style="text-align: center; display:none">Already have an account?&nbsp;&nbsp;<span><strong><em>Sign In</em></strong></span></p>
	</div>

	 <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/home.js"></script>
</body>
</html>