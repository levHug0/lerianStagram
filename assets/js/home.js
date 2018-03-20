var firstName 	= document.querySelector("#firstName"),
	lastName	= document.querySelector("#lastName"),
	email		= document.querySelector("#createEmail"),
	createPass	= document.querySelector("#createPass"),
	confPass	= document.querySelector("#confirmPass"),
	loginEmail  = document.querySelector("#email"),
	password	= document.querySelector("#password");

	firstName.addEventListener("blur", firstNameVerify, true);
	lastName.addEventListener("blur", lastNameVerify, true);
	email.addEventListener("blur", verifyEmail, true);
	createPass.addEventListener("blur", verifyPass, true);
	loginEmail.addEventListener("blur", verifyLoginEmail, true);
	password.addEventListener("blur", verifyLoginPassword, true);

/*	To show the modal	*/
$(document).ready(function() {
    $('#myModal').modal('show');
}); 

/*	For hiding/showing register and login divs	*/
$('.container').on("click", "span", function() {
	$('.registerForm').slideToggle();
	$('.login').slideToggle();
});

/*******************************************************/
/******	Register form validation functions below *******/

function errorDisplay(id, message, input) {
	var error = document.querySelector(id);
	error.textContent = message;
	error.style.display = "inline-block";
	input.focus();
}

function removeError(id) {
	var error = document.querySelector(id);
	error.style.display = "none";
	error.textContent = "";
}

function firstNameVerify() {
	if (firstName.value.length > 0) {
		removeError("#errorFirstName");
		return true;
	}
}

function lastNameVerify() {
	if (lastName.value.length > 0) {
		removeError("#errorLastName");
		return true;
	}
}

function verifyEmail() {
	if (email.value.length > 3 && email.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
		removeError("#errorEmail");
		return true;
	}
}

function verifyPass() {
	if (createPass.value.length >= 6 && createPass.value.match(/^[\w]*$/)) {
		removeError("#errorCreatePass");
		return true;
	}
}

function verifyLoginEmail() {
	if (loginEmail.value.length > 0 && loginEmail.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
		removeError("#loginEmailError");
		return true;
	}
}

function verifyLoginPassword() {
	if (password.value.length > 0 && password.value.length > 5) {
		removeError("#loginPasswordError");
		return true;
	}
}

/*	Validates the inputs from the login form	*/
function loginValidate() {
	if (loginEmail.value == "") {
		errorDisplay("#loginEmailError", "Email is required", loginEmail);
		return false;

	} else if (!loginEmail.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
		errorDisplay("#loginEmailError", "Email format: example@gmail.com", loginEmail);
		return false;

	} else if (password.value == "") {
		errorDisplay("#loginPasswordError", "Password is required", password);
		return false;

	} else if (password.value.length < 6) {
		errorDisplay("#loginPasswordError", "Minimum length is 6 characters", password);
		return false;
	}
}

/*	Validates the inputs from the register form	*/
function validate() {
	if (firstName.value == "") {
		errorDisplay("#errorFirstName", "FirstName is required", firstName);
		return false;

	} else if (!firstName.value.match(/^[a-z-A-Z ]*$/)) {
		errorDisplay("#errorFirstName", "First Name can only contain letters and hyphens", firstName);
		return false;

	} else if (lastName.value == "") {
		errorDisplay("#errorLastName", "Last Name is required", lastName);
		return false;

	} else if (!lastName.value.match(/^[a-z-A-Z ]*$/)) {
		errorDisplay("#errorLastName", "Last Name can only contain letters and hyphens", lastName);
		return false;

	} else if (email.value == "") {
		errorDisplay("#errorEmail", "Email is required", email);
		return false;

	} else if (email.value.length < 4) {
		errorDisplay("#errorEmail", "Minimum length is 4 characters", email);
		return false;

	} else if (!email.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
		errorDisplay("#errorEmail", "Email format: example@gmail.com", email);
		return false;

	} else if (createPass.value == "") {
		errorDisplay("#errorCreatePass", "Password is required", createPass);
		return false;

	} else if (createPass.value.length < 6) {
		errorDisplay("#errorCreatePass", "Minimum length is 6 characters", createPass);
		return false;

	} else if (!createPass.value.match(/^[\w]*$/)) {
		errorDisplay("#errorCreatePass", "Allowed characters are: letters, numbers, and underscores", createPass);
		return false;

	} else if (confPass.value == "") {
		errorDisplay("#errorConfirmPass", "Confirm Password is required", confPass);
		return false;

	} else if (confPass.value != createPass.value) {
		errorDisplay("#errorConfirmPass", "Passwords don't match!", confPass);
		return false;
	}
}