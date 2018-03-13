var firstName 	= document.querySelector("#firstName"),
	lastName	= document.querySelector("#lastName"),
	createusr	= document.querySelector("#createUsername"),
	createPass	= document.querySelector("#createPass"),
	confPass	= document.querySelector("#confirmPass"),
	username    = document.querySelector("#username"),
	password	= document.querySelector("#password");

	firstName.addEventListener("blur", firstNameVerify, true);
	lastName.addEventListener("blur", lastNameVerify, true);
	createusr.addEventListener("blur", verifyUserName, true);
	createPass.addEventListener("blur", verifyPass, true);

/*	To show the modal	*/
$(document).ready(function() {
    $('#myModal').modal('show');
}); 

/*	For hiding/showing register and login divs	*/
$('.container').on("click", "span", function() {
	$('.registerForm').slideToggle();
	$('.login').slideToggle();
	$('p:nth-of-type(1)').slideToggle();
	$('p:nth-of-type(2)').slideToggle();
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
	if (firstName.value.match(/^[a-z-A-Z]*$/)) {
		removeError("#errorFirstName");
		return true;
	}
}

function lastNameVerify() {
	if (lastName.value.match(/^[a-z-A-Z]*$/)) {
		removeError("#errorLastName");
		return true;
	}
}

function verifyUserName() {
	if (createusr.value.length >= 6 && createusr.value.match(/^[\w\.]*$/)) {
		removeError("#errorUserName");
		return true;
	}
}

function verifyPass() {
	if (createPass.value.length >= 6 && createPass.value.match(/^[\w]*$/)) {
		removeError("#errorCreatePass");
		return true;
	}
}

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

	} else if (createusr.value == "") {
		errorDisplay("#errorUserName", "Username is required", createusr);
		return false;

	} else if (createusr.value.length < 6) {
		errorDisplay("#errorUserName", "Minimum length is 6 characters", createusr);
		return false;

	} else if (!createusr.value.match(/^[\w\.]*$/)) {
		errorDisplay("#errorUserName", "Allowed characters are: letters, numbers, underscores, periods", createusr);
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


