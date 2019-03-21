function formValidation() {

	var errBox = document.getElementById('error-area').innerHTML;
	if(errBox != "") {
		clearError('error-area');
	}

	var fn = document.getElementById('fname').value;
	var ln = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	var pw1 = document.getElementById('pw1').value;
	var pw2 = document.getElementById('pw2').value;
	var add = document.getElementById('address').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var zip = document.getElementById('zip').value;
	var country = document.getElementById('countries').value;
	var cont = document.getElementById('continents').value;
	var phone = document.getElementById('phone').value;
	var bday = document.getElementById('bday').value;
	var termsbox = document.getElementById('termsbox').checked;


	var isOkay = true;

	if(fn != "") {

		if(!checkFirstName(fn)) {

			document.getElementById('fname').classList.add('error-set');
			document.getElementById('error-area').classList.add('error-set');
			document.getElementById('error-area').innerHTML += "<p class='error-msg'>First name can only contain letters.</p>";
			isOkay = false;

		} else {

			document.getElementById('fname').classList.remove('error-set');

		}

	} else {

		document.getElementById('fname').classList.add('error-set');
		document.getElementById('error-area').classList.add('error-set');
		document.getElementById('error-area').innerHTML += "<p class='error-msg'>First name is empty.</p>";
		isOkay = false;

	}

	

	if(ln != "") {

		if(!checkFirstName(ln)) {

			document.getElementById('lname').classList.add('error-set');
			document.getElementById('error-area').classList.add('error-set');
			document.getElementById('error-area').innerHTML += "<p class='error-msg'>Last name can only contain letters.</p>";
			isOkay = false;

		} else {

			document.getElementById('lname').classList.remove('error-set');

		}

	} else {

		document.getElementById('lname').classList.add('error-set');
		document.getElementById('error-area').classList.add('error-set');
		document.getElementById('error-area').innerHTML += "<p class='error-msg'>Last name is empty.</p>";
		isOkay = false;

	}

	if(email != "") {
		if(!checkEmail(email)) {
			document.getElementById('email').classList.add('error-set');
			document.getElementById('error-area').classList.add('error-set');
			document.getElementById('error-area').innerHTML += "<p class='error-msg'>Enter a valid email.</p>";
			isOkay = false;
		} else {
			document.getElementById('email').classList.remove('error-set');
		}
	} else {
		document.getElementById('email').classList.add('error-set');
		document.getElementById('error-area').classList.add('error-set');
		document.getElementById('error-area').innerHTML += "<p class='error-msg'>Email is empty.</p>";
		isOkay = false;
	}
	
	if(checkPassword(pw1, pw2)) {
		document.getElementById('pw1').classList.remove('error-set');
		document.getElementById('pw2').classList.remove('error-set');
	} else {
		document.getElementById('pw1').classList.add('error-set');
		document.getElementById('pw2').classList.add('error-set');
		document.getElementById('error-area').classList.add('error-set');
	}
	
	if(phone != "") {
		
		if(!checkPhoneNumber(phone)) {
			document.getElementById('phone').classList.add('error-set');
			document.getElementById('error-area').classList.add('error-set');
			document.getElementById('error-area').innerHTML += "<p class='error-msg'>Please check Phone Number format.</p>";
			isOkay = false;
		} else {
			document.getElementById('phone').classList.remove('error-set');
		}

	} else {
		document.getElementById('phone').classList.remove('error-set');
	}
	
	if(!termsbox) {
		document.getElementById('tos').classList.add('error-set');
		document.getElementById('tos-msg').classList.remove('hidden');
		isOkay = false;
	} else {
		document.getElementById('tos').classList.remove('error-set');
		document.getElementById('tos-msg').classList.add('hidden');
	}

	return isOkay;


};

function checkFirstName(input) {
	var sample = /^[A-Za-z ]+$/;
	if(/^[A-Za-z ]+$/.test(input)) {
		return true;
	} else {
		return false;
	}
}

function checkEmail(input) {

	if( /(.+)@(.+){2,}\.(.+){2,}/.test(input)) {
		return true;
	} else {
		return false;
	}

}

function checkPassword(p1, p2) {

	var test;

	if(p1.length <= 8 || p1.length >= 16) {
		document.getElementById('error-area').innerHTML += "<p class='error-msg'>Passwords must be between 8-16 characters</p>";
		test = false;
	}

	if(p2 != p1) {
		document.getElementById('error-area').innerHTML += "<p class='error-msg'>Passwords do not match.</p>";
		test = false;
	}

	if(p1.length >= 8 && p1.length <= 16) {
		if(p1 == p2) {
			test = true;
		}
	}

	return test;

}

function checkPhoneNumber(input) {

	if(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(input)) {
		return true;
	} else {
		return false;
	}

}

function clearError(eleID) {
	document.getElementById(eleID).innerHTML = "";
}